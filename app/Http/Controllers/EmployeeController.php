<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\App;
use App\Member;
use App\Phone;
use Illuminate\Support\Facades\Storage;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = ["ru", "en", "kz"];
        $this->validate($request, [

        ]);
        if( $request->has("lang"))
        {
            if($request->lang=="ru")
            {
                App::setLocale("ru");
            }
            else if($request->lang=="kz")
            {
                App::setLocale("kz");
            }
            else App::setLocale('en');
        }

        $employees=Employee::paginate(1);
        return view("employees")->with(compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("createEmployee");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'salary'=>'required|integer|min:40000',
            'name'=>'string|required|max:255',
            'surname'=>'string|required|max:255',
            'position'=>'string|required|max:255'
        ]);//валидация полей ввода
        if($request->hasFile("image"))
        {
            $name = Storage::put("images", $request->file("image"));
            $url = Storage::url($name);
            $employee = new Employee($request->all());
            $employee->image= $url;
            $employee->save();
        }
        return redirect("/employees");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=Employee::find($id);
        return view("/showEmployee")->with(compact("emp"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp=Employee::find($id);
        return view("editEmployee")->with(compact("emp"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $emp=Employee::find($id);
        $emp->fill($request->all());
        $emp->save();
        return redirect("/employees")->with("status", "Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect("/employees")->with("status", "Deleted");
    }

    public function home()
    {
        return view('home');
    }

    public function fired()
    {
        $emp=Employee::onlyTrashed()->paginate(1);
        return view("showFired")->with(compact("emp"));
    }
    public function member()
    {
        return Phone::find(1)->with("member")->first();
    }



}
