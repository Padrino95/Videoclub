    <section class="container">
        <div class="row justify-content-between">
            <h1 class="text-center pt-5 mt-5">Comentarios</h1>
            
            <?php
            if ($comentarios != '') {

                foreach ($comentarios as $value) {
                    if ($value["idSocio"] == $_SESSION["id"]) {
                        echo "<div class='col-md-6 border border-light text-center'>";
                        echo "
                    <h3 >$value[socio]</h3>
                    <p >$value[texto]</p>
                    <p >".fechaEspañol($value["fecha"])."</p>
                    <form action='../Controladores/verSerieCompleta.php' method='post'>
                        <input type='hidden' name='idSocio' value='$value[idSocio]'>
                        <input type='hidden' name='idSerie' value='$value[idSerie]'>
                        <input type='hidden' name='fecha' value='$value[fecha]'>
                        <input type='submit' name='borrar' class='mb-1 btn btn-warning' value='Borrar'>
                    </form>
                    
                    ";
                        echo "</div>";
                    } else {
                        echo "<div class='col-md-6 border border-light text-center'>";
                        echo "
                    <h3 >$value[socio]</h3>
                    <p >$value[texto]</p>
                    <p >".fechaEspañol($value["fecha"])."</p>
                    ";
                        echo "</div>";
                    }
                }
            }

            if ($mostrar == 0) {
                echo "<section class='container form-signin pt-5'>
                <div class='row justify-content-center'>
                <form action='../Controladores/verSerieCompleta.php' method='post' class='col-4'>
                    <div class='text-center'>
                        <h1 class='h3 mb-3 fw-normal'>Pon tu comentario</h1>
                    </div>
                    <div>
                        <input type='hidden' name='idSerie' value=$_GET[id]>
                    </div>
                    <div class='form-floating'>
                        <input type='text' class='form-control mb-3' id='floatingInput' name='Comentario' placeholder='Comentario'>
                        <label for='floatingInput'>Comentario</label>
                    </div>
                    <button class='w-100 btn btn-lg btn-danger' type='submit' name='enviarComentario'>Comentar</button>
                    <p class='mt-5 mb-3 text-muted text-center'>© 2017–2021</p>
                </form>
            </div>
            </section>
            ";
            }
            ?>
        </div>
    </section>