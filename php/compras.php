<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function(){
            var $paquete = $("#paquete1, #paquete2, #paquete3");
            $paquete.on("change", function(){
                var lugares = $(this).val();
                var precio = $(this).attr("data-precio");
                var total = lugares*precio;
                $(this).next("p").text("$"+total);
            });

            $("modalConfirmar").modal({
                show:false
            });

            $("#btnConfirmar").on("click",function(){
                var total= 0;
                $("#modalConfirmar").modal("show");
                $paquete.each(function(){
                    var numero=$(this).val();
                    var $precioCaja=$(this);
                    var precio=$precioCaja.attr("data-precio")*numero;

                    total = total + parseInt(precio);
                });
                $("#precioFinal").text("El total es: $" + total);
            });
            $("#btnAceptar").on("click", function(){
              $btn=$(this);
              $btn.prop("disabled", true);

              var lugaresPaquete1=$("#paquete1").val();
              var lugaresPaquete2=$("#paquete2").val();
              var lugaresPaquete3=$("#paquete3").val();

              $.ajax({
                url:"comprar.php",
                method:"POST",
                data: {
                  paquete1:lugaresPaquete1,
                  paquete2:lugaresPaquete2,
                  paquete3:lugaresPaquete3
                }
              })
              .done(function(){
                $btn.prop("disabled",false);
                $("#modalConfirmar").modal("hide");
              })
            })

        });
    </script>

    <style> 
        .column{
            display:inline-table;
            margin-left: 272px;
        }
        button{
            margin-left:621px;
            margin-top:272px;
        }
        img{
            width:120px;
        }
    </style>
    </head>
    <body>
    <div class="column">
        <img src="../img/comida1.svg" alt="Maruchan">
        <br>
        <input type="number" id="paquete1" data-precio="100" value="0" min="0" max="10" class="ham"/>
        <p>$100</p>
    </div>
    <div class="column">
        <img src="../img/comida2.svg" alt="Sushi">
        <br>
        <input type="number" id="paquete2" data-precio="500" value="0" min="0" max="10"/>
        <p>$500</p>
    </div>
    <div class="column">
        <img src="../img/comida3.svg" alt="Langosta">
        <br>
        <input type="number" id="paquete3" data-precio="1000" value="0" min="0" max="10"/>
        <p>$1000</p>
    </div>
    <br>
    <button class="btn btn-outline-dark " id="btnConfirmar">Comprar</button>

    <div class="modal" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
        ¿Desea confirmar su selección?
        </p>
        <p id="precioFinal">
        KK
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="Cancelar">Cancelar</button>
        <button type="button" id="btnAceptar" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>