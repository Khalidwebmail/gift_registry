

<div class="col-lg-12ddd" style="">
             
           
            @if(\Session::has('success'))
            <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                 {{\Session::get('success')}}
                 <input type="hidden" id="success" value="success">
             </div> 
            @endif
            
            @if(\Session::has('warning'))
            <div class="alert alert-warning">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                 {{\Session::get('warning')}}
                 <input type="hidden" id="warning" value="warning">
             </div> 
            @endif
            
            @if(\Session::has('error'))
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                 {{\Session::get('error')}}
                 <input type="hidden" id="error" value="error">
             </div> 
            @endif
            
            
    @if ($errors->any())
   <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                <input type="hidden" id="validation" value="danger">
            @endforeach
       
    </div>
    @endif
    
    
    
</div>