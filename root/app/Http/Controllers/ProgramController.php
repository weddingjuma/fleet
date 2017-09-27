<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\ProgramRequest;
use App\Program;
use App\Repositories\ProgramRepository;
use App\Trip;
use App\Vehicle;
use Carbon\Carbon;
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
        return view('program.create',compact('repository'));
        //je view te repository field gulo lagbe shei view te  repository pass korte hobe
    }

    public function index()
    {
        $repository = $this->repository;
        $programs = Program::all();
        return view('program.index',compact('programs','repository'));
    }

    public function store(ProgramRequest $request)
    {
        $query = DB::select(DB::Raw("SHOW TABLE STATUS LIKE 'programs'"));
        $query = $query[0]->Auto_increment;
        //dd('halt');
        Program::query()->create($request->all());
        $this->trips($request->all(),$query);
        return redirect('programs');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $programs = Program::all();
        $program = Program::query()->findOrFail($id);
        return view('program.edit',compact('program','programs','repository'));
    }

    public function update($id, ProgramRequest $request)
    {
        $program = Program::query()->findOrFail($id);
        Session::flash('success','"'.$program->name.'" is updated!');
        $program->update($request->all());
        return redirect('programs');
    }

    public function destroy($id)
    {
        $program = Program::query()->findOrFail($id);
        $program->delete();
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

    public function rotation()
    {
        $date = Input::has('date') ? Carbon::parse(Input::get('date')) : Carbon::now();
        $repository = $this->repository;
        $vehicles = Vehicle::all();
        return view('program.rotation',compact('vehicles','repository','date'));
    }

    public function trips($request,$query)
    {
        //$query = DB::select(DB::Raw("SHOW TABLE STATUS LIKE 'invoices'"));
        //dd($request);
        $keys = preg_grep('/^driver_id[0-9]/',array_keys($request));
        //dd($keys);
        foreach($keys as $key){
            //dd($key);
            preg_match('!\d+!',$key,$number);
            //dd($number);
            foreach($number as $num){
                //dd($num);
                $data = [
                    'program_id' => $query,
                    'vehicle_id' => $request['vehicle_id'.$num],
                    'driver_id' => $request['driver_id'.$num],
                    'driver_adv' => $request['driver_adv'.$num],
                    'd_a_fix' => $request['d_a_fix'.$num],
                    'extra_adv' => $request['extra_adv'.$num]
                ];
                //dd($data);
                Trip::query()->create($data);
            }
        }
    }
}
