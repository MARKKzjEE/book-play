@extends('Template')

@section('Main')
<!-- Top content / Advanced search -->
<div class="position-relative overflow-hidden p-3 p-md-1 m-md-2 text-left">
        <div class="col-md-12 p-lg-1 mx-auto my-1 align-items-center ">
            <h1> Has seleccinado el club: <?php echo $ID?> </h1>
            
        </div>



    </div>


    <!-- BottomContent / Sports centers searched -->
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light classe-header">
        <div class="album py-5 bg-light">
            <h3 class="display-5 container-fluid"> Clubs disponibles </h3>
            <br/>
            <div class="container">
                <div class="row">

                    
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                
                                <div class="card-body">
                                    
                                    <hr/>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    

                    

                </div>
            </div>
        </div>
    </div>

@endsection