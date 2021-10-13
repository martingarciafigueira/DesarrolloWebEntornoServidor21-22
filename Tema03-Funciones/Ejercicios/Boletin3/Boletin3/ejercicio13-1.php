<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 13</title>
    </head>

    <body>
        <h1>Convertidor de distancias</h1>

        <form action="ejercicio13-2.php" method="get">
            <p>
                Quiero convertir:
                <input type="number" name="numero" size="40">
                <select name="inicial">
                    <optgroup label="Sistema métrico">
                        <option value="km">km</option>
                        <option value="m">m</option>
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                    </optgroup>
                    <optgroup label="Sistema inglés">
                        <option value="milla">milla</option>
                        <option value="yarda">yarda</option>
                        <option value="pie">pie</option>
                        <option value="pulgada">pulgada</option>                    
                    </optgroup>
                    <optgroup label="Tiempo">
                        <option value="horas">horas</option>
                        <option value="minutos">minutos</option>
                        <option value="segundos">segundos</option>
                    </optgroup>                      
                </select>
                a
                <select name="final">
                    <optgroup label="Sistema métrico">
                        <option value="km">km</option>
                        <option value="m" selected>m</option>
                        <option value="cm">cm</option>
                        <option value="mm">mm</option>
                    </optgroup>
                    <optgroup label="Sistema inglés">
                        <option value="milla">milla</option>
                        <option value="yarda">yarda</option>
                        <option value="pie">pie</option>
                        <option value="pulgada">pulgada</option>                                        
                    </optgroup>
                    <optgroup label="Tiempo">
                        <option value="horas">horas</option>
                        <option value="minutos">minutos</option>
                        <option value="segundos">segundos</option>
                    </optgroup>                      
                </select>
            </p>

            <p>
                <input type="submit" value="Convertir">
                <input type="reset" value="Borrar">
            </p>
        </form>
    </body>
</html>
