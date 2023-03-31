<?php

namespace App\Http\Controllers;
use App\Models\FindTutor;
use Illuminate\Http\Request;


class FindATutor extends Controller
{
    function index()
    {
      $findTutor = FindTutor::inRandomOrder()->get();
      $FT = compact('findTutor');
      return view('FindATutor')->with($FT);
    
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = FindTutor::all()
         ->where('tutorusername', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = FindTutor::all()
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
      for ($i=0; $i<$total_row; $i++)
      {
        $output = '
          <tr>
           <td>'.$data[$i]->tutorusername.'</td>
           <td>'.$data[$i]->institute.'</td>
          </tr>
          ';
      }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array('table_data'  => $output,
);

      echo json_encode($data);
     }
    }
}


