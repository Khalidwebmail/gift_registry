


<div class="containerx">
             
           
            @if(\Session::has('success'))
            <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                 {{\Session::get('success')}}
             </div> 
            @endif
            
            @if(\Session::has('warning'))
            <div class="alert alert-warning">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                 {{\Session::get('warning')}}
             </div> 
            @endif
            
            @if(\Session::has('error'))
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                 {{\Session::get('error')}}
             </div> 
            @endif
            
            
    @if ($errors->any())
   <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
       
    </div>
    @endif
    
    
    
</div>