<?php

/// Créer un pseudo forum dispo sur la page accueil

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class MenuController extends Controller
{
    //

  public function getReservationOnDate($query,$date_start,$date_end)
  {
    return $query->where('date_end', '>=', $date_end)
        ->where('date_start', '<=', $date_start);
  }

  public function getReservationOnOneDate($query,$date)
  {
    return $this->getReservationOnDate($query,$date,$date);
  }

  public function countReservationOnOneDate($query,$date)
  {
    return $this->getReservationOnOneDate($query,$date)->count();
  }

  public function index(){
    $dataset = [];

     for($date = Carbon::now()->subDay(7); $date->lte(Carbon::now()->addDay(7)); $date->addDay()) {
        $countDate =$this->countReservationOnOneDate(Reservation::select('id', 'room_id', 'guest_id', 'date_start', 'date_end', 'people'),$date);
         $dataset[] = [$date->format('d-m'),$countDate];
     }
     return View('menu',compact('dataset'));

  }
}
