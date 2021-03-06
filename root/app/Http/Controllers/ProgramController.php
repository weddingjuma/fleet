<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Income;
use App\Program;
use App\Repositories\ProgramRepository;
use App\Trip;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\TripCost;

use Illuminate\Support\Facades\Session;

class ProgramController extends Controller
{
    private $repository;

    public function __construct(ProgramRepository $repository){
        $this->middleware('auth');
        $this->repository=$repository;
        //programRepository is the class name & also the file name
    }

    public function create(){
        $repository = $this->repository;
        $trips = Trip::all()->where('program_id',null);
        $num = 0;
        return view('program.create',compact('repository','trips','num'));
    }

    public function index()
    {
        $repository = $this->repository;
        $programs = Program::all();
        $total = Program::query()->sum('rent');
        $paid = Program::query()->sum('adv_rent');
        $due = Program::query()->sum('due_rent');
        $i=1;

        $trips = Trip::all();

        return view('program.index',compact('programs','i','total','paid','due','repository','trips'));
    }

    public function store(ProgramRequest $request)
    {
        $query = DB::select(DB::Raw("SHOW TABLE STATUS LIKE 'programs'"));
        $query = $query[0]->Auto_increment;

        $request['program_id'] = $query;
        Program::query()->create($request->all());

        //dd($request->all());
        $request['paid'] = $request->get('adv_rent');
        Income::query()->create($request->all());
        $this->trips($request->all(),$query);
        return redirect('programs');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $trips = Trip::all()->where('program_id',$id);
        $num = 1;
        $program = Program::query()->findOrFail($id);
        return view('program.edit',compact('program','trips','num','repository'));
    }

    public function update($id, ProgramRequest $request)
    {
        $program = Program::query()->findOrFail($id);
        $program->update($request->all());

        $ids = Trip::all()->whereIn('program_id',$id)->pluck('id');
        foreach($ids as $tid){
            $trip = Trip::query()->findOrFail($tid);
            $trip->delete();
        }

        //dd($id);
        $this->trips($request->all(),$id);

       // $request['program_id'] = $id;
        $request['paid'] = $request->get('adv_rent');
        Income::query()->update($request->only('rent','paid','due_rent'));

        Session::flash('success','"'.$program->name.'" is updated!');
        return redirect('programs');
    }

    public function destroy($id)
    {
        $program = Program::query()->findOrFail($id);
        //$income = Income::query()->findOrFail($id);
        $program->delete();
        //$income->delete();
        Session::flash('success','"'.$program->name.'" has been deleted successfully!');
        return redirect('programs');
    }


    public function programReport(){
        $tripCosts = TripCost::all();
        $repository = $this->repository;
        return view('program.programReport',compact('tripCosts','repository'));
    }

    public function driverReceipt(){
        $tripCosts = TripCost::all();
        $repository = $this->repository;
        return view('program.driverReceipt',compact('tripCosts','repository'));
    }

    public function rotation(Request $request)
    {
        $date = Input::has('date') ? Carbon::parse(Input::get('date')) : Carbon::now();
        $repository = $this->repository;
        $vehicles = Vehicle::all()->where('status_id','<',4)->sortByDesc('status_id');
        return view('program.rotation',compact('vehicles','repository','date'));
    }

    public function dailyReport()
    {
        $date = Input::has('date') ? Carbon::parse(Input::get('date')) : Carbon::now();
        //$repository = $this->repository;
        $programs = Program::query()->where('date',$date)->get();
//        dd($programs);
//        query()->whereDate('date','=',$date);
        return view('program.dailyReport',compact('programs','date'));
    }

    public function trips($request,$query)
    {
        //$query = DB::select(DB::Raw("SHOW TABLE STATUS LIKE 'invoices'"));
        $keys = preg_grep('/^driver_id[0-9]/',array_keys($request));
        //dd($query);
        foreach($keys as $key){
            //dd($key);
            preg_match('!\d+!',$key,$number);
//            dd($number);
            foreach($number as $num){
                $data = [
                    'program_id' => $query,
                    'vehicle_id' => $request['vehicle_id'.$num],
                    'driver_id' => $request['driver_id'.$num],
                    'driver_adv' => $request['driver_adv'.$num],
                    'd_a_fix' => $request['d_a_fix'.$num],
                    'extra_adv' => $request['extra_adv'.$num],
                    'loading' => $request['loading'.$num],
                    'unloading' => $request['unloading'.$num],
                    'product' => $request['product'.$num],
                    'emp_container' => $request['emp_container'.$num],
                    'fuel' => $request['fuel'.$num],
                    'trip_status' => 1
                ];

                $vid = Vehicle::query()->findOrFail($request['vehicle_id'.$num]);
                $vid->status_id = 3;
                DB::table('vehicles')
                    ->where('id', $vid->id)
                    ->update(['status_id' => $vid->status_id]);
//                dd($vid);
//                dd($data);

                Trip::query()->create($data);
            }
        }
    }

    public function dailyIncomeReport()
    {
        $fromDate = Input::has('from') ? Carbon::parse(Input::get('from')) : Carbon::now();
        $toDate = Input::has('to') ? Carbon::parse(Input::get('to')) : Carbon::now();
        $incomes = Income::query()->whereBetween('date',[$fromDate,$toDate])->get();
        $i = 1;
        $total = Income::query()->whereBetween('date',[$fromDate,$toDate])->sum('rent');
        $paid = Income::query()->whereBetween('date',[$fromDate,$toDate])->sum('paid');
        $due_rent = Income::query()->whereBetween('date',[$fromDate,$toDate])->sum('due_rent');

        return view('program.dailyIncomeReport',compact('i','incomes','fromDate','toDate','total','paid','due_rent'));
    }

    public function show($id){
        $trips = Trip::query()->where('program_id',$id)->get();
        $date = $trips->first()->program->date;
        return view('program.show',compact('trips','date'));
    }

    public function showTrip(Request $request)
    {
        $id = $request->get('id');
//        $program = Program::query()->findOrFail($id);
//        dd($programs);
//        $trips = $programs->trips()->get();
        $trips = Trip::all()->where('program_id',$id)->where('trip_status',1);

        $num = 1;
        return view('program.showTrip',compact('trips','program','num'));
    }

    public function programTrips(Request $request)
    {
        $programs = $request->get('vehicle');
        $trips = Trip::query()->where('program_id',$programs->id)->get();
        $combo='<option>'.null.'<option>';
        foreach($trips as $trip){
            $combo.= '<option value="'.$problem->id.'">'.$problem->problem.'</option>';
        }
        $combo.='';
        return $combo;
    }

    public function dateWiseTripReport()
    {
        $fromDate = Input::has('from') ? Carbon::parse(Input::get('from')) : Carbon::now();
        $toDate = Input::has('to') ? Carbon::parse(Input::get('to')) : Carbon::now();
        $programs = Program::query()->whereBetween('date',[$fromDate,$toDate])->get();

        $total = Program::query()->whereBetween('date',[$fromDate,$toDate])->sum('rent');
        $paid = Program::query()->whereBetween('date',[$fromDate,$toDate])->sum('adv_rent');
        $due = Program::query()->whereBetween('date',[$fromDate,$toDate])->sum('due_rent');


//        $trips = Trip::query()->where()->get();
        $i = 1;
        return view('program.dateWiseTripReport',compact('programs','fromDate','trips','toDate','i','total','paid','due'))  ;
    }
}