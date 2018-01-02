<!DOCTYPE html>
<html>
<head>
    <title>Proyecto de prueba</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> --}}
    <link href="{{ asset('css/login-style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-agileits">
        <h1>Prototipo del sistema</h1>
        <div class="main-row">
            <ul class="steps">
                <li class="is-active">Bienvenida</li>
                <li>Rol</li>
                <li>Credenciales</li>
            </ul>
            <form class="form-wrapper" action="{{ route('login') }}" method="post">
                <fieldset class="section is-active"> 
                    <h3>Bienvenido</h3>
                    <p>El siguiente es un prototipo de prueba.</p>
                    <div class="button">Siguiente</div> 
                </fieldset>
                <fieldset class="section">
                    <h3>Seleccione Rol</h3>
                    <div class="row cf">
                        <div class="four w3grids-agile">
                            <input type="radio" name="nickname" id="r1" value="empleado" checked>
                            <label for="r1">
                                <h4>Empleado</h4>
                            </label>
                        </div>
                        <div class="four w3grids-agile">
                            <input type="radio" name="nickname" id="r2" value="encargado">
                            <label for="r2">
                                <h4>Encargado</h4>
                            </label>
                        </div>
                        <div class="four w3grids-agile">
                            <input type="radio" name="nickname" id="r3" value="gestor">
                            <label for="r3">
                                <h4>Gestor</h4>
                            </label>
                        </div>
                    </div>
                    <div class="button">Siguiente</div>
                </fieldset>
                <fieldset class="section">
                    <h3>Ingresar la contraseña</h3>
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                    <input class="submit button" type="submit" value="Ingresar">
                </fieldset>
                {{ csrf_field() }}
                {{-- <fieldset class="section">
                    <h3>Account Created !</h3>
                    <p>Your account has been created successfully. </p>
                    <div class="button">Reset Form</div>
                </fieldset> --}}
            </form>
        </div>  
    </div>  
    <!-- //main -->
    <div class="w3copyright-agile">
        <p>© 2017. All rights reserved</p>
    </div>
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".form-wrapper .button").click(function() {
                let button = $(this),
                    currentSection = button.parents(".section"),
                    currentSectionIndex = currentSection.index(),
                    headerSection = $('.steps li').eq(currentSectionIndex)
                currentSection.removeClass("is-active").next().addClass("is-active")
                headerSection.removeClass("is-active").next().addClass("is-active")

                /*$(".form-wrapper").submit(function(e) {
                    e.preventDefault()
                })
                

                if (currentSectionIndex === 3) {
                    $(document).find(".form-wrapper .section").first().addClass("is-active")
                    $(document).find(".steps li").first().addClass("is-active")
                }*/
            })
        })
    </script>
</body>
</html>
