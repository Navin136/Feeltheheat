<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melting</title>
    <link rel="stylesheet" href="css/melting.css">
    <script defer src="js/melting.js"></script>
    <script defer src="js/spec.js"></script>
    <link rel="icon" href="icon.png">
</head>
<body>
    <div id="mainheader">
        <p id="FTH"><img src="fth.png" alt="" id="fthicon"> Melt Ease</p>
        <a class="dept" href="melting.php">Melting</a>
        <a class="dept" href="spectrolab.php">Holding</a>
        <a class="dept" href="treatment.php">Treatment</a>
        <a class="dept" href="nodlab.php">Nodularity Lab</a>
        <!-- <a class="dept" href="moulding.php">Moulding</a> -->
    </div>
    <div id="fbox">
        <div>
            <label for="pattern">Pattern</label>
            <input type="text" id="pattern"><br>
                    <table class="spec">
                        <td>
                            <tr class="elecomp">C%</tr>
                            <tr><input name="pcarbon" id="pcarbon"></tr></br>
                        </td>
                        <td>
                            <tr class="elecomp">Si%</tr>
                            <tr><input name="psilicon" id="psilicon"></tr></br>
                        </td>
                        <td>
                            <tr class="elecomp">Cu%</tr>
                            <tr><input name="pcopper" id="pcopper"></tr></br>
                        </td>
                        <td>
                            <tr class="elecomp">Sn%</tr>
                            <tr><input name="ptin" id="ptin"></tr></br>
                        </td>
                        <td>
                            <tr class="elecomp">Mn%</tr>
                            <tr><input name="pmanganese" id="pmanganese"></tr></br>
                        </td>
                        <td>
                            <tr class="elecomp">Mo%</tr>
                            <tr><input name="pmolybdenum" id="pmolybdenum"></tr></br>
                        </td>
                        <td>
                            <tr class="elecomp">Ni%</tr>
                            <tr><input name="pnickel" id="pnickel"></tr></br>
                        </td>
                    </table>
        </div>
        <div class="gradeselector" onchange="chargemix()">
            <label for="grade">Grade: </label>
            <select id="grade" name="grade" disabled>
                <option value="sg-tin">SG - Tin Route</option>
                <option value="sg-copper">SG - Copper Route</option>
                <option value="sg-azterlan">SG - Azterlan</option>
                <option value="sg-lowmoly">SG - Low Molybdenum</option>
                <option value="sg-highmoly">SG - High Molybdenum</option>
                <option value="cg-moly">CG - Molybdenum</option>
                <option value="simoni">CG - SiMoNi</option>
                </select>
                <table>
                <tr>
                    <th>Raw Material</th>
                    <th>Proportion</th>
                    <th>Weight</th>
                </tr>
                <tr>
                    <td>Steel</td>
                    <td><input id="psteel" ></td>
                    <td><input id="wsteel" ></td>
                </tr>
                <tr>
                    <td>Foundry Returns</td>
                    <td><input id="preturns" ></td>
                    <td><input id="wreturns" ></td>
                </tr>
                <tr>
                    <td>Borings</td>
                    <td><input id="pborings" ></td>
                    <td><input id="wborings" ></td>
                </tr>
                <tr>
                    <td>Pig Iron</td>
                    <td><input id="ppigiron" ></td>
                    <td><input id="wpigiron" ></td>
                </tr>
        </table>
    </div>  
    <div class="additives">
        
        <h2>Enter the mandatory Additives:</h2>
        <label for="maddn">Neograf</label>
        <input type="text" class="maddn">
        <label for="maddh">Hi-carbon</label>
        <input type="text" class="maddh">
        <div class="result"></div>
        <button onclick="chargemix()" id="btn">Give me additives</button>
    </div>
</div>
    <div id="footer">
        <h2><b>Designed by Navin Kumar</b></h2>
        <p>&#169 Copyright 2024. All rights reserved.</p>
    </div>
</body>
</html>