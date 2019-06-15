<?php

namespace App\Http\Controllers\Backend;

use App\Cities;
use App\Routes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RoutesController extends Controller
{

    public function index()
    {
        $routes = Routes::orderBy('routes_id', 'DESC')->paginate(8);
        return view('backend.route.list_route', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Cities::all();

        return view('backend.route.create_route', compact('cities'));
    }


    public function store(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        $route = new Routes();
        $this->validate($request, [
            'destination' => 'required'
        ]);
        $destination = $request->destination;
        $last = count($destination) - 1;
        $data['destination'] = implode(',', $destination);
        $data['routes_title'] = $destination[0] . "-" . $destination[$last];
        if ($route->create($data)) {
            return redirect()->route('routes')->with('success', 'The record has been successfully inserted.');
        }
        return redirect()->route('routes')->with('error', 'Sorry, the record couldn\'t be stored');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {

        $route = Routes::orderBy('routes_id', 'DESC')->paginate('8');

        return view('backend.route.view_route', compact('route'));
    }

    public function show(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $routeId = $request->id;
        $route = Routes::where('routes_id', $routeId)->first();
        $destination = explode(',', $route->destination);
        return view('backend.route.show_route', compact('route', 'destination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $routeId = $request->id;
        $cities = Cities::all();
        $route = Routes::where('routes_id', $routeId)->first();
        $destination = explode(',', $route->destination);
        return view('backend.route.edit_route', compact('route', 'cities','destination'));
    }


    public function update(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('routes');
        }
        $routeId = $request->id;
        $destination = $request->destination;
        $data['destination'] = implode(',', $destination);
        $data['routes_title'] = $request->routes_title;
        if (Routes::where('routes_id', $routeId)->update($data)) {
            return redirect()->route('routes')->with('success', 'The record has been successfully inserted');
        }
        return redirect()->route('routes')->with('error', 'Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $routeId = $request->id;
        if (Routes::where('routes_id', $routeId)->delete()) {
            return redirect()->route('routes')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('routes')->with('error', 'Sorry,the record couldn\'t be deleted');


    }
}
