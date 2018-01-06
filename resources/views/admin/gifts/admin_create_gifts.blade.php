<?php
$pageInfo = ['pageTitle' => 'Create Gifts', 
'pageSummery' => 'Create New Gifts', 
'tabTitle' => 'Create Gifts', 
'bread1' => 'Dashboard', 
'bread1_url' => '',
'bread2' => 'Create Gifts',
'bread2_url' => '',
'bread3' => '',
'bread3_url' => ''

];

?> 


@include('admin.admin_header')
@include('admin.admin_top_navigation')
@include('admin.admin_left_navigation')




<div class="content-wrapper" style="height: auto; overflow: hidden">
<!-- Content Header (Page header) -->

@include('admin.admin_breadcrumbs')
<section class="containerx content-header">
@include('admin.admin_notification')
</section>


<!-- Main content -->
<section class="col-lg-12 content">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title"> Create Gifts </h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
<i class="fa fa-minus"></i></button>
<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
<i class="fa fa-times"></i></button>
</div>
<input type="submit" class="btn btn-warning pull-right" value="Gift ID: {{$gift_id}}" style="margin-right:70px;" disabled/>
</div>
<div class="box-body">

<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">Gift Basic Information</a></li>
<li><a href="#gift_pricing" data-toggle="tab">Gift Pricing</a></li>
<li><a href="#settings" data-toggle="tab">Gift Description</a></li>
<li><a href="#quantity" data-toggle="tab">Gift Quantity</a></li>
<li><a href="#gift_images" data-toggle="tab">Gift Images</a></li>
<li><a href="#gift_attribute" data-toggle="tab">Gift Attributes</a></li>
<li><a href="#meta_details" data-toggle="tab">Meta Details</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">
<div class="row">
<form role="form" action="{{ url('/create-gifts-save') }}/basic_settings/{{$gift_id}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-md-6">

    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Gift Name*</label>
            <input type="text" class="form-control" name="gift_name" id="gift_name"  placeholder="Enter name" onkeyup="ActiveAlias(this.value)" value="{{$gift_name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Alias*</label>
            <input type="text" name="gift_alias" class="form-control" id="alias" placeholder="Alias" value="{{$alias}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Gift SKU</label>
            <input type="text" name="gift_sku" class="form-control" id="sku" placeholder="SKU" value="{{$gift_sku}}">
        </div>


    </div>
    <!-- /.box-body -->



</div>

<div class="col-md-6">
    <div class="box-body">
        <div class="form-group">
            <label>Select Category*</label>
            <select class="form-control" name="gift_category" style="width: 100%;">
                <option value=''>Select Category</option>
                @foreach($categories as $cat)
                <option value="{{$cat->id}}" <?php if($cat_id==$cat->id){ ?> selected="selected" <?php }?>>{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Publish/Unpublish* {{$publish_status}}</label>
            <select class="form-control" name="gift_status" style="width: 100%;">
                <?php if($publish_status == '1') {?>
                <option value="1" selected="selected"> Published </option>
                <?php } ?>
                <?php if($publish_status == '0') {?>
                <option value="0" selected="selected"> Unpublished </option>
                 <?php } ?>
                <?php if($publish_status == '') {?>
                <option value="1">Publish</option>
                <option value="0">Unpublish</option>
                <?php } ?>
                <?php if($publish_status != '1' && $publish_status != '') {?>
                <option value="1">Publish</option>
                <?php } ?>
                <?php if($publish_status != '0' && $publish_status != '') {?>
                <option value="0">Unpublish</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Access*</label>
            <select class="form-control" name="gift_access" style="width: 100%;">
                 <?php if($access == 1) {?>
                <option value="1" selected="selected"> public </option>
                <?php } ?>
                <?php if($access == 2) {?>
                <option value="2" selected="selected"> Registered </option>
                 <?php } ?>
                <option value="1">Public</option>
                <option value="2"> Registered</option>
            </select>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="gift_featured" <?php if($featured == 1) {echo 'checked';}?>> Make this Gift as Featured
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="gift_new" <?php if($new_arrival == 1) {echo 'checked';}?>> Make this Gift as New/Hot
            </label>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
        <input type="submit" name ="save_exit" class="btn btn-warning pull-right" value="Save & Exit" style="margin-right:8px;"/>
    </div>
</div>

</form>
</div>

</div>
<!-- /.tab-pane -->
<div class="tab-pane" id="gift_pricing">

<div class="row">
<form role="form" action="{{ url('/create-gifts-save') }}/gift_pricing/{{$gift_id}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-md-6">

    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">General/Sell Price*</label>
            <input class="form-control" name="sell_price" id="sell_price" value="{{$sell_price}}" onkeyup="ActivePrice(this.value)">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Special Price</label>
            <input type="text" class="form-control" id="special_price" name="special_price" value="{{$special_price}}" onchange="ActivePrice2(this.value)" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Active Price</label>
            <input type="text" class="form-control" id="active_price"  name="active_price" value="{{$active_price}}" readonly="true">
        </div>


    </div>
    <!-- /.box-body -->



</div>

<div class="col-md-6">
    <div class="box-body">
        <div class="form-group">
            <label>Discount Type</label>
            <select class="form-control" name="discount_type" id="get_discount" style="width: 100%;" onkeyup="discountType(this.value)" >
                <?php if($discount_type == 'none') {?>
                <option value="none" selected="selected"> No Discount </option>
                <?php } ?>
                 <?php if($discount_type == 'percentage') {?>
                <option value="percentage" selected="selected"> Parcentage(%) </option>
                <?php } ?>
                 <?php if($discount_type == 'fixed') {?>
                <option value="fixed" selected="selected"> Fixed Value </option>
                <?php } ?>
                <?php if($discount_type == '') {?>
                <option value="none" selected="selected">No Discount</option>
                <?php } ?>
                <?php if($discount_type != 'none' && $discount_type != '') {?>
                <option value="none">No Discount</option>
                <?php } ?>
                <?php if($discount_type != 'percentage') {?>
                <option value="percentage">Parcentage(%)</option>
                <?php } ?>
                <?php if($discount_type != 'fixed') {?>
                <option value="fixed">Fixed value</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Discount Value</label>
            <input type="text" class="form-control" id="discount_value" name="discount_value" value="{{$discount_value}}" onkeyup="getDiscountType()">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Discounted Price</label>
            <input type="text" class="form-control" id="discounted_price" name="discounted_price" value="{{$discounted_price}}" readonly="true">
        </div>
        <div class="empty49" style="height: 19px;"></div>
        
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
        <input type="submit" name ="save_exit_two" class="btn btn-warning pull-right" value="Save & Exit" style="margin-right:8px;"/>
    </div>
</div>
</form>
</div>

</div>
<!-- /.tab-pane -->

<div class="tab-pane" id="settings">

<div class="row">
<form role="form" action="{{ url('/create-gifts-save') }}/gift_description/{{$gift_id}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-md-6">

    <div class="box-body">
        <div class="form-group">
            <label>Short Description</label>
            <div class="box-body pad">

                <textarea id="editor1" placeholder="Place some text here" name="short_description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                              {{$short_decription}}
                </textarea>

            </div>  
        </div>
    </div>
    <!-- /.box-body -->



</div>

<div class="col-md-6">
    <div class="box-body">

        <div class="form-group">
            <label>Long Description</label>
            <div class="box-body pad">

                <textarea id="editor2" placeholder="Place some text here" name="long_description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; text-align: left;">
                      {{$long_decription}}
                </textarea>

            </div>  
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
        <input type="submit" name ="save_exit_three" class="btn btn-warning pull-right" value="Save & Exit" style="margin-right:8px;"/>
    </div>
</div>
</form>
</div>


</div>
<!-- /.tab-pane -->


<div class="tab-pane" id="quantity">

<div class="row">
<form role="form" action="{{ url('/create-gifts-save') }}/gift_quantity/{{$gift_id}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-md-6">

    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Quantity*</label>
            <input type="number" class="form-control" name="quantity" value="{{$quantity}}" placeholder="quantity(number only)">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"> Lower Stock Notification </label>
            <input type="text" class="form-control" value="{{$lower_stock}}" name="lower_stock" placeholder="Number only">
        </div>
        


    </div>
    <!-- /.box-body -->
</div>

<div class="col-md-6">
    <div class="box-body">
        <div class="form-group">
            <label>Availability</label>
            <select class="form-control" name="stock_status" style="width: 100%;">
                <?php if($stock_status == 1) {?>
                <option selected="selected" value="1">In Stock</option>
                <option value="0">Out of Stock</option>
                <?php } ?>
                <?php if($stock_status == 0) {?>
                <option selected="selected" value="0">Out of Stock</option>
                <option value="1">In Stock</option>
                <?php } ?>
            </select>
        </div>

    </div>
    <!-- /.box-body -->
    <div class="empty47" style="height: 47px;"></div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
        <input type="submit" name ="save_exit_four" class="btn btn-warning pull-right" value="Save & Exit" style="margin-right:8px;"/>
    </div>
</div>
</form>
</div>

</div>
<!-- /.tab-pane -->


<div class="tab-pane" id="gift_images">

<div class="row">
<form role="form" action="{{ url('/create-gifts-save') }}/gift_images/{{$gift_id}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-md-6">

    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputFile"> Upload Image</label>
            <input type="file" name="gift_image">


        </div>

        <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-left">Upload & Continue</button>
        <input type="submit" name ="save_exit_five" class="btn btn-warning pull-left" value="upload & Exit" style="margin-left:8px;"/>
    </div>

    </div>
    <!-- /.box-body -->
</div>

<div class="col-md-6">
    <div class="box-body row">
        <ul class="thumbnails">
      @foreach($giftImages as $giftImg)
      
      <li class="imgBoxCustomAdmin">
        <div class="thumbnail">
         <a class="close" href="{{ url('/delete-gift-images') }}/{{$giftImg->media_id}}">×</a>
            <img class="giftImages" src="{{asset('gift_images')}}/{{$giftImg->gift_image}}" />
            
        </div>
      </li>
     
       @endforeach
        </ul>

     

    </div>
    <!-- /.box-body -->  
</div>
</form>
</div>

</div>
<!-- /.tab-pane -->


<div class="tab-pane" id="gift_attribute">

<div class="row">

<div class="col-md-8">
<form role="form" action="{{ url('/create-gifts-save') }}/gift_attribute/{{$gift_id}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="box-body">

        <div class="form-group">  
            <form name="add_name" id="add_name">  
                <div class="table-responsive">  
                    <table class="table table-bordered" id="dynamic_field">  
                        <tr>  
                            <td>
                       

                                <select class="form-control select2" name="att_name" style="width: 100%;">
                                    <option value=''>Select Attribute</option>
                                    @foreach($attributes as $atts)
                                    <option value="{{$atts->attribute_id}}">{{$atts->attribute_name}}</option>
                                    @endforeach
                                </select>

                            </td> 

                            <td><button type="button" name="add" id="add" class="btn btn-success">Add Values</button></td>  
                        </tr>  
                    </table>  
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Save Attributes" />  
                </div>  
          
        </div>  


    </div>
    <!-- /.box-body -->
</form>
</div>
<?php
$attributes = DB::table('mktk_gift_attribute')
->join('mktk_attributes', 'mktk_attributes.attribute_id', '=', 'mktk_gift_attribute.attribute_id')
->Where('mktk_gift_attribute.gift_id', $gift_id)
->select('mktk_attributes.attribute_name', 'mktk_attributes.attribute_id as attMainId','mktk_gift_attribute.*')
->groupBy('mktk_gift_attribute.attribute_id')
->get();



?>
<div class="col-md-4">
    <div class="box-body">
        <table class="table table-bordered">
            @foreach($attributes as $att)
            
            <tr>
                <td style="width:80%;">
                    <div class="attNameline" style="width: 100%; padding: 5px; background: #f5f5f5;">{{$att->attribute_name}} </div>
                    
                    <?php
            $attributeValues = DB::table('mktk_gift_attribute')
                        ->Where('attribute_id', $att->attribute_id)
                        ->select('*')
                        ->get();
            
            
            ?>
                  
                    @foreach($attributeValues as $attVals)
                    
                    <div class="attValus" style="margin-top: 4px; border: 1px solid #eee; padding: 5px;">
                    <a class="close" href="{{ url('/delete-attribute-value') }}/{{$attVals->id}}">×</a>
                    <p>{{$attVals->value}}</p>
                    <p>Price: 500</p>
                    <p>Quantity: 10</p>
                    </div>
                      
                    @endforeach
                    
                    
                    
                </td>
                <td style=" vertical-align: middle;"><a href="{{ url('/delete-attribute-name') }}/{{$att->attMainId}}" class="btn btn-default">X</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.box-body -->  
</div>

</div>

</div>
<!-- /.tab-pane -->


<div class="tab-pane" id="meta_details">

<div class="row">
<form role="form" action="{{ url('/create-gifts-save') }}/meta_data/{{$gift_id}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-md-6">

    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputPassword1">Meta Keywords</label>
            <div class="box-body pad">

                <textarea id="editor1" name="meta_keywords" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                     {{$meta_keywords}}         
                </textarea>

            </div>  
        </div>
    </div>
    <!-- /.box-body -->



</div>

<div class="col-md-6">
    <div class="box-body">

        <div class="form-group">
            <label for="exampleInputPassword1">Meta Description</label>
            <div class="box-body pad">

                <textarea id="editor1" name="meta_des" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        {{$meta_des}}      
                </textarea>

            </div>  
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
        <input type="submit" name ="save_exit_seven" class="btn btn-warning pull-right" value="Save & Exit" style="position:relative;left:-8px;"/>
    </div>
</div>
</form>
</div>


</div>
<!-- /.tab-pane -->




</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->

</div>
<!-- /.box-body -->

</div>
<!-- /.box -->
</section>



</div>
<!-- /.content-wrapper -->









@include('admin.admin_footer')



<script>
$(document).ready(function () {
var i = 1;
$('#add').click(function () {
i++;
$('#dynamic_field').append('<tr id="row' + i + '"><td>\n\
<input type="text" name="attvalname[]" placeholder="Value" class="form-control name_list" /> \n\
<input type="text" name="attPrice[]" placeholder="Price" class="form-control name_list" style="margin-top:8px;" />\n\
\n\<input type="text" name="attQuantity[]" placeholder="Quantity" class="form-control name_list" style="margin-top:8px;" />\n\
</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
});
$(document).on('click', '.btn_remove', function () {
var button_id = $(this).attr("id");
$('#row' + button_id + '').remove();
});
$('#submit').click(function () {
$.ajax({
url: "name.php",
method: "POST",
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
data: $('#add_name').serialize(),
success: function (data)
{
alert(data);
$('#add_name')[0].reset();
}
});
});
});
</script>


<script>
$(function () {
//Initialize Select2 Elements
$('.select2').select2()
})
</script>


<script>


function ActivePrice(sell_price) {

document.getElementById('active_price').value = sell_price;

}
function ActivePrice2(special_price) {

if(special_price > 0) {
document.getElementById('active_price').value = special_price;
} else {
sellPrice = document.getElementById("sell_price").value;
document.getElementById('active_price').value = sellPrice;
var ttt = document.getElementsById("get_discount").document.createAttribute("readonly");; 
}
}
function discountType(discountType) {

return discountType;
}

function getDiscountType() {

discountValue = document.getElementById("discount_value").value;
discountType = document.getElementById("get_discount").value;

if(discountType == 'fixed') {
sellPrice = document.getElementById("sell_price").value;
activePrice = document.getElementById("active_price").value = sellPrice;

if(discountValue > 0) {
newActivePrice = activePrice - discountValue;
document.getElementById('active_price').value = newActivePrice;
document.getElementById('discounted_price').value = newActivePrice;
} else {
alert('Add Discount Value');
}
}
if(discountType == 'percentage') {
sellPrice = document.getElementById("sell_price").value;
activePrice = document.getElementById("active_price").value = sellPrice;

if(discountValue > 0) {
percenTvalue = (activePrice*discountValue)/100;
newActivePrice = activePrice - percenTvalue;
document.getElementById('active_price').value = newActivePrice;
document.getElementById('discounted_price').value = newActivePrice;
} else {
alert('Add Discount Value');
}
}

if(discountType == 'none') {
sellPrice = document.getElementById("sell_price").value;
activePrice = document.getElementById("active_price").value = sellPrice;
discountValue = document.getElementById("discount_value").value = 0;
discountedPrice = document.getElementById("discounted_price").value = 0;


}

}

//  getDiscountType();


</script>

<script>
function ActiveAlias(gift_name) {

var hyphened = gift_name.replace(/ /g, '-');
document.getElementById('alias').value = hyphened.toLowerCase();
document.getElementById('sku').value = hyphened.toLowerCase();

}
</script>

<script type="text/javascript" src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
  $(function () {
    CKEDITOR.replace('editor1');
  });

   $(function () {
    CKEDITOR.replace('editor2');
  });
</script>