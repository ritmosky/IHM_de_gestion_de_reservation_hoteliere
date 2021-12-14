<?php

/// Créer un pseudo forum dispo sur la page accueil

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Services\GuestTableService;
use App\Services\ReservationTableService;
use App\Services\MenuTableService;
use App\Http\Interfaces\ManageTableInterface;
use App\Services\RoomTableService;

class MenuController extends Controller
{

  protected $menuTableService;

  public function __construct(MenuTableService $menuTableService)
  {
      $this->menuTableService = $menuTableService;
  }

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
    $datasetReservationPrevision = [];

     for($date = Carbon::now()->subDay(7); $date->lte(Carbon::now()->addDay(7)); $date->addDay()) {
        $countDate =$this->countReservationOnOneDate(Reservation::select('id', 
              'room_id', 'guest_id', 'date_start', 'date_end', 'people'),$date);
         $datasetReservationPrevision[] = [$date->format('d-m'),$countDate];
     }

     $todayTimeStamp = Carbon::now();
     $today = $todayTimeStamp->format("Y-m-d");

     $todayIncoming = Reservation::select('id','room_id','guest_id','people')
                          ->where('date_start',$today)
                          ->where('Check_in','=',0)
                          ->paginate(5);
    
    $todayDeparture = Reservation::select('id','room_id','guest_id','people')
            ->where('date_end',$today)
            ->where('Check_in','=',1)
            ->paginate(5);
      
     $viewData = [
      'dataReservationPrevision' => $datasetReservationPrevision,
      'columns' => $this->menuTableService->getColumns(),
      'dataArrive' => $todayIncoming,
      'dataDepart' => $todayDeparture, 
      'routeName'  => $this->menuTableService->getRouteName(),  
     ];

     return View('menu',$viewData);

  }

  public function checkIn($objectId){
    $object = Reservation::find($objectId);
    $object->check_in = ( $object->check_in + 1 ) % 2;
    $object->save();
    return redirect()->route($this->menuTableService->getRouteName().'.index');     
  }
}
