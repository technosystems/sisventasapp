<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Compra;
use App\Models\Gastos;
use App\Models\Producto;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (\Auth::user()->hasRole('Vendedor')) {

            return redirect('/admin/panel/venta/generar');
        }

        else
        {
             $start_date = date("Y").'-'.'01'.'-'.'01';
        $end_date = '2022-12-31';  //date("Y").'-'.date("m").'-'.cal_days_in_month(CAL_GREGORIAN,date("m"),date(""));;
         $start_date_mes = date("Y").'-'.date("m").'-'.'01';
        $yearly_sale_amount = [];
         $month[] = date("F", strtotime($start_date));


            $revenue = \DB::table('linea_productos')->whereDate('fecha', '>=' , $start_date)->whereDate('fecha', '<=' , $end_date)->sum('total');

            $revenue_mes = \DB::table('linea_productos')->whereDate('fecha', '>=' , $start_date_mes)->whereDate('fecha', '<=' , $end_date)->sum('total');
           // dd($revenue);
            $recent_sale = \DB::table('venta')->orderBy('id', 'desc')->where('iduser', \Auth::id())->take(5)->get();

            $recent_purchase =Compra::with('detalle')->orderBy('id', 'desc')
                ->where('user_id', \Auth::id())->take(5)->get();

            $products = Producto::orderBy('id', 'desc')
                ->where('user_id', \Auth::id())->take(5)->get();

            $recent_expense = Gastos::with('tipo_gasto')->whereDate('fecha', '>=' , $start_date)->where('user_id', \Auth::id())->whereDate('fecha', '<=' , $end_date)->get();

            $expense = Gastos::with('tipo_gasto')->whereDate('fecha', '>=' , $start_date)->where('user_id', \Auth::id())->whereDate('fecha', '<=' , $end_date)->sum('cantidad');
            //dd($recent_expense);




            $purchase = DB::table('linea_productos')->whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('total');
            //dd($purchase);

            $best_selling_qty = \DB::table('detalle_ventas')->select(\DB::raw('idproducto, sum(cantidad) as sold_qty'))->whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->groupBy('idproducto')->orderBy('sold_qty', 'desc')->take(5)->get();
       //  dd($best_selling_qty);

            $yearly_best_selling_qty = \DB::table('detalle_ventas')->select(\DB::raw('idproducto, sum(cantidad) as sold_qty'))->whereDate('created_at', '>=' , date("Y").'-01-01')->whereDate('created_at', '<=' , date("Y").'-12-31')->groupBy('idproducto')->orderBy('sold_qty', 'desc')->take(5)->get();

            $yearly_best_selling_price = \DB::table('detalle_ventas')->select(\DB::raw('idproducto, sum(total_pagado) as total_price'))->whereDate('created_at', '>=' , date("Y").'-01-01')->whereDate('created_at', '<=' , date("Y").'-12-31')->groupBy('idproducto')->orderBy('total_price', 'desc')->take(5)->get();

             // yearly report
                $start = strtotime(date("Y") .'-01-01');
                $end = strtotime(date("Y") .'-12-31');
                while($start < $end)
                {
                    $start_date = date("Y").'-'.date('m', $start).'-'.'01';
                    $end_date = date("Y").'-'.date('m', $start).'-'.'31';

                        $sale_amount = \DB::table('venta')->where('fecha', '>=' , $start_date)->where('fecha', '<=' , $end_date)->where('iduser', \Auth::id())->sum('total');




                    $yearly_sale_amount[] = number_format((float)$sale_amount, 2, '.', '');
                    $start = strtotime("+1 month", $start);
                }



            $today = getdate();
            $data_month = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
            $config = DB::table('configuraciones')->first();
            $current_month = $today['mon'];
            $current_year = $today['year'];

            $total_pagado = DB::table('venta')
            ->selectRaw('sum(cast(total as double precision))')
            ->where('estado','=','Procesado')
            ->first();

            $total_mes = DB::table('venta')->select(DB::raw('sum(cast(total as double precision))'))
            ->where([
               ['estado','=','Procesado'],
                ['mes','=',date('m')],
                ['year','=',date('Y')]
            ])
            ->first();





            $productos = DB::table('productos')
            ->where('status',1)
            ->count();

            $usuarios = DB::table('users')
            ->get();

            $mes_actual =$data_month[$current_month - 1];


             $today = getdate();
        $data_month = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $current_month = $today['mon'];




        $config = DB::table('configuraciones')->first();

        $caja_mes_anterior = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',$today['mon']-1],
            ['year','=',$current_year]
        ])
        ->first();


        $caja_mes_actual = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',$today['mon']],
            ['year','=',$current_year]
        ])
        ->first();



        /*PORCENTAJES*/



        $caja_1 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',1],
            ['year','=',$current_year]
        ])
        ->first();


        $caja_2 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',2],
            ['year','=',$current_year]
        ])
        ->first();



        $caja_3 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',3],
            ['year','=',$current_year]
        ])
        ->first();



        $caja_4 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',4],
            ['year','=',$current_year]
        ])
        ->first();



        $caja_5 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',5],
            ['year','=',$current_year]
        ])
        ->first();



        $caja_6 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where('mes','=',6)
        ->first();



        $caja_7 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',7],
            ['year','=',$current_year]
        ])
        ->first();


        $caja_8 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',8],
            ['year','=',$current_year]
        ])
        ->first();



        $caja_9 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',9],
            ['year','=',$current_year]
        ])
        ->first();


        $caja_10 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',10],
            ['year','=',$current_year]
        ])
        ->first();



        $caja_11 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',11],
            ['year','=',$current_year]
        ])
        ->first();


        $caja_12 = DB::table('cajas')
        ->select(DB::raw('sum(cast(monto as double precision))'))
        ->select(DB::raw('sum(cast(monto_cierre as double precision))'))
        ->where([
            ['mes','=',12],
            ['year','=',$current_year]
        ])
        ->first();

       $tasa = $this->bolivares();

        //dd(LogSistema::get());
        $date_current = Carbon::now()->toDateTimeString();

        $prev_date1 = $this->getPrevDate(1);
        $prev_date2 = $this->getPrevDate(2);
        $prev_date3 = $this->getPrevDate(3);
        $prev_date4 = $this->getPrevDate(4);
        $prev_date5 = $this->getPrevDate(4);
        $prev_date6 = $this->getPrevDate(5);
        //$prev_date12 = $this->getPrevDate(12);

           
       
        $emp_count_0  = \App\Models\Login::where('mes',[date('m')])->count();
        $emp_count_1  = \App\Models\Login::where('mes',[$prev_date1])->count();
        $emp_count_2  = \App\Models\Login::where('mes',[$prev_date2])->count();
        $emp_count_3  = \App\Models\Login::where('mes',[$prev_date3])->count();
        $emp_count_4  = \App\Models\Login::where('mes',[$prev_date4])->count();
        $emp_count_5  = \App\Models\Login::where('mes',[$prev_date6])->count();





       //dd($prev_date3, $prev_date2);

            return view('admin.home.index', compact('revenue_mes','revenue','expense','recent_expense','purchase', 'month','products', 'yearly_sale_amount', 'recent_sale','recent_purchase','best_selling_qty', 'yearly_best_selling_qty', 'yearly_best_selling_price','mes_actual','productos','caja_1','caja_2','caja_3','caja_4','caja_5','caja_6','caja_7','caja_8','caja_9','caja_10','caja_11','caja_12','current_year','caja_mes_anterior','config','caja_mes_actual','tasa','emp_count_1',
                'emp_count_0',
            'emp_count_2',
            'emp_count_3',
            'emp_count_4',
            'emp_count_5'));

        }



    }


    public function bolivares()
    {
        $tbolivares = \DB::table('tasas')->where('fecha_emision',date('Y-m-d'))->count();

        return $tbolivares;
    }

    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->format('m');
    }
}
