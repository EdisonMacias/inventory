@extends('include.master')


@section('title','Inventario | Reporte-Venta')


@section('page-title','Informe de venta')


@section('content')




<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					
				Informe de venta
					
				</h2>

				<h2 class="pull-right">
					
			<a href="{{ url('print-report') }}?type={{ $type }}&start_date={{ $start_date }}&end_date={{ $end_date }}&category_id={{ $category_id }}&product_id={{ $product_id }}&stock_id={{ $stock_id }}&vendor_id={{ $vendor_id }}&customer_id={{ $customer_id }}&user_id={{ $user_id }}" target="_blank" type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float">
                               <i class="material-icons">print</i>
                                     </a>
					
				</h2>
			</div>


			<div class="body">

				<div class="table-responsive">
					<table class="table table-bordered table-condensed">
						<thead>
							<tr>
								<td colspan="11" style="border: none !important;">
									<h3 style="text-align: center;">{{ $company->name }}</h3>
								</td>

							</tr>		

							<tr style="border: none !important;">
								<td colspan="11" style="border: none !important;">
									<p style="text-align: center;">{{ $company->address }} <br>
										 {{ $company->phone }}</p></td>

							</tr>  			

							<tr style="border: none !important;">
								<td colspan="11" style="border: none !important;"><p style="text-align: center;font-weight: bold;">Informe de venta de {{ date('j M Y',strtotime($start_date)) }} al {{ date('j M Y',strtotime($end_date)) }}</p></td>

							</tr>
							<tr>
								<th>producto</th>
								<th>Comprobante</th>
								<th>Fecha de venta</th>
								<th>cliente</th>
								<th>vendedor</th>
								<th>cantidad</th>
								<th>Precio de compra unitario</th>
								<th>Precio de venta unitario</th>
								<th>Importación de descuento</th>
								<th>Total Compra Importe</th>
								<th>Importe de venta total</th>
							
							</tr>
						</thead>


						<tbody>
							<?php
							$total_quantity = 0;
							$total_buy_price = 0;
							$total_sold_price  = 0;
							$total_discount  = 0;
							?>
							@foreach($data as $value)

							<?php 
							$total_quantity += $value->sold_quantity;
							$total_buy_price += $value->total_buy_price;
							$total_sold_price += $value->total_sold_price;
							$total_discount += $value->discount_amount;
							?>
							<tr>

								<td>{{ $value->product->product_name }}</td>
								<td>{{ $value->chalan_no }}</td>
								<td>{{ date("j M Y", strtotime($value->selling_date) ) }}</td>
								<td>{{ $value->customer->customer_name }}</td>
								<td>{{ $value->user->name }}</td>
								<td>{{ $value->sold_quantity }}</td>
								<td>{{ $value->buy_price }}</td>
								<td>{{ $value->sold_price }}</td>
								<td>{{ $value->discount_amount }}</td>
								<td>{{ $value->total_buy_price }}</td>
								<td>{{ $value->total_sold_price }}</td>
								
							</tr>
							@endforeach

							<tr>
								<th colspan="5" style="text-align: right;">Total =</th>
								<th >{{ round($total_quantity) }}</th>
								<th ></th>
								<th ></th>
								<th >{{ round($total_discount) }}</th>
								<th >{{ round($total_buy_price) }}</th>
								<th >{{ round($total_sold_price) }}</th>
							
							</tr>


						</tbody>
					</table>
				</div>


			</div>


		</div>
	</div>
</div>




@endsection

