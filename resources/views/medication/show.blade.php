@extends('master')
@section('title', 'Medication Infomation')
@section('panel-title', 'Medication Detail')
@section('mi', 'active')
@section('li-medication', 'active')
@section('medication', 'true')

@section('content')
    <div class="content">
            <div class="container-fluid">
                    <a href="/medication" class="btn btn-wd btn-default btn-fill btn-move-left pull-right">
                            <span class="btn-label">
                                <i class="ti-angle-left"></i>
                            </span>  Back
                    </a>
			</div>
                <div class="card">
                        <div class="card-header">
	                                <h4 class="card-title">{{$medication->pro_name}}</h4>
	                                <p class="category">Here is a detail information for this medication</p>
	                	</div>
                    <div class="card-content table-responsive table-full-width">
	                                <table class="table table-striped">
	                                    <!-- <thead>
	                                        <th>Title</th>
	                                    	<th>Detail</th>
	                                    </thead> -->
	                                    <tbody>
	                                        <tr>

	                                        	<td>Medicine Code</td>
	                                        	<td>{{$medication->pro_code}}</td>
	                                        </tr>
                                            <tr>
	                                        	<td>Medicine Name</td>
	                                        	<td>{{$medication->pro_name}}</td>
	                                        </tr>
                                            <tr>
	                                        	<td>Category</td>
	                                        	<td>{{$medication->category->name}}</td>
	                                        </tr>
                                            <tr>
	                                        	<td>Packages Infomation</td>
	                                        	<td>
				
													Package type: <span class="label label-info">{{getVal($medication->Package, $medication->package_id, 'name')}}</span>
													| Number Package: <span class="label label-warning">* {{getVal($medication, $medication->items_in_pack ,'items_in_pack')}}</span>
													| Purchase Price: <span class="label label-success">{{getVal($medication->purchaseItem->last()== null ? null : $medication->purchaseItem->last(), $medication->purchaseItem->last(), 'purchase_items_unit_cost')}} $ </span>
													| Selling Price: <span class="label label-danger"> {{getVal($medication, $medication->item_unit_cost, 'item_unit_cost')}} $</span>
													| Avilable in Stock: <span class="label label-primary"> {{getVal($medication->stock, $medication->stock, 'stock_package')}} </span>
												</td>
	                                        </tr>
											<tr>
	                                        	<td>Item Infomation</td>
	                                        	<td>

												Item type: <span class="label label-info">{{getVal($medication->items_in_pack_package_id == null ? null : $packages[$medication->items_in_pack_package_id], $medication->items_in_pack_package_id, 'name')}}</span>
													| Number Item in Package: <span class="label label-warning">* {{getVal($medication, $medication->sub_items_in_item, 'sub_items_in_item')}}</span>
													| Purchase Price: <span class="label label-success">{{getVal($medication->purchaseItem->last(), $medication->purchaseItem->last() , 'purchase_sub_items_unit_cost')}} $ </span>
													| Selling Price: <span class="label label-danger"> {{getVal($medication, $medication->sub_item_unit_cost, 'sub_item_unit_cost')}} $</span>
													| Avilable in Stock: <span class="label label-primary"> {{getVal($medication->stock, $medication->stock, 'stock_item')}} </span>
												</td>
	                                        </tr>
											<tr>
	                                        	<td>Sub-item Infomation</td>
	                                        	<td>
												
													Sub-item type: <span class="label label-info">{{getVal($medication->sub_items_in_item_package_id == null ? null : $packages[$medication->sub_items_in_item_package_id], $medication->sub_items_in_item_package_id, 'name')}}</span>
													| Number sub-item in Item: <span class="label label-warning">* {{getVal($medication, $medication->qty, 'qty')}}</span>
													| Purchase Price: <span class="label label-success">{{getVal($medication->purchaseItem->last(), $medication->purchaseItem->last(), 'purchase_price')}} $ </span>
													| Selling Price: <span class="label label-danger"> {{getVal($medication, $medication->price, 'price')}} $</span>
													| Avilable in Stock: <span class="label label-primary"> {{getVal($medication->stock, $medication->stock, 'stock_subItem')}} </span>
												</td>
	                                        </tr>
											<tr>
												<td>Manufacturing</td>
												<td>{{Carbon\Carbon::parse((getVal($medication, $medication->manufacturing_date, 'manufacturing_date')))->format('d/m/Y')}}</td>
											</tr>
											<tr>
												<td>Expiry</td>
												<td>{{Carbon\Carbon::parse((getVal($medication, $medication->expiry_date, 'expiry_date')))->format('d/m/Y')}}</td>
											</tr>
											<tr>
												<td>Weight</td>
												<td>{{getVal($medication, $medication->weight, 'weight')}}</td>
											</tr>
											<tr>
												<td>Ranking Number</td>
												<td>{{getVal($medication->ranking, $medication->ranking, 'name')}}</td>
											</tr>
											<tr>
												<td>Remark</td>
												<td>{{getVal($medication, $medication, 'remark')}}</td>
											</tr>
	                                    </tbody>
	                                </table>
	                            <!-- </div>
                    </div> -->
            	</div>
			</div>
    </div>

@endsection

@section('script')

<script type="text/javascript">

</script>
@endsection



