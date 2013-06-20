<?php

namespace Admin\Security;

use Admin\BaseController;
use View;
use IDSLog;


class IntrusionController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $events = IDSLog::all();

        return View::make('admin/security/intrusion/index', compact('events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $event = IDSLog::find($id);

        return View::make('admin/security/intrusion/show', compact('event'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $event = IDSLog::find($id)->first();
        $event->delete();

        return \Redirect::action('Admin\Security\IntrusionController@index');
    }
}