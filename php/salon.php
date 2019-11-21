<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reservaciones</title>
        <script src="../node_modules/jquery/dist/jquery.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="../css/salon.css">
    </head>
    <script>

        var idSilla= 0;

        $(function(){
            $('.silla').tooltip();
            $('#ventanaConfirmacion').modal({show: false});

            $(".silla").on("click",function(){
                var reservada=$(this).hasClass("silla-reservada");

                if(reservada){
                    idSilla=$(this).data("id");
                    $("#ventanaConfirmacion").modal("show");
                }
            });
        
        $("#btnCancelar").on("click", function(){
            $("#ventanaConfirmacion").modal("hide");
        });

        $("#btnAceptar").on("click",function(){
            $.ajax({
                url: "confirmarReservacion.php",
                method: "POST",
                data: {
                    silla: idSilla
                }
            })
            done(function(){

            });
        });
    });
    

        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <body>
        <section class="salon">
            <?php

            include("procesarPlantillas.php");

            ?>
        </section>


        <div class="modal" id="ventanaConfirmar" role="dialog">
         <div class="modal-dialog">
         <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title">Confirmar reservación</h5>
         </div>
         <div class="modal-body">
         <p>¿Confirmar su reservación?</p>
         </div>
         <div class="modal-footer">
         <button class="btn btn-secondary" id="btnCancelar">No</button>
         <button class="btn btn-primary" id="btnAceptar">No</button>
         </div>
         </div>         
         </div>     
        </div>
    </body>
</html>