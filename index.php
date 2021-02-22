<?php 
    if(isset($_POST['first_no'])) {
        $answer = null;

        $num1 = $_POST['first_no'];
        $num2 = $_POST['second_no'];
        $operator = $_POST['operator'];

        switch($operator) {
            case "+":
                $answer = $num1 + $num2;
                break;
            case "-":
                $answer = $num1 - $num2;
                break;
            case "*":
                $answer = $num1 * $num2;
                break;
            case "/":
                $answer = $num1 / $num2;
                break;
            default:
                $answer = "Please Select A Valid Operator!";
        }        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #content {
            display: flex;
            flex-direction: column;
        }
        .input-div {
            display: flex;
            flex-direction: column;
            margin-bottom: 10%;
        }
        .input-div input, .generalInput {
            border: 2px solid orangered;
            border-radius: 5px;
            height: 30px;
            margin-top: 3%;
        }
        .input-div input {
            padding-left: 5%;
            padding-top: 0.5%;
            font-weight: bold;
        }
        .input-div label {
            font-weight: bold;
        }
        select, #btn {
            cursor: pointer;
        }
        #answer {
            margin-top: 10%;
            border-radius: 5px;
            height: 30px;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div id="content">
        <form id="calculator" method="POST" action="index.php">
            <div class="input-div">
                <label>Type The First Number Here</label>
                <input type="number" id="number1" required step="any" name="first_no">
            </div>
            <div class="input-div">
                <label>Type The Second Number Here</label>
                <input type="number" id="number2" required step="any" name="second_no">
            </div>
            <select name="operator" class="generalInput">
                <option value="">Please Select an Operator</option>
                <option value="+">Addition</option>
                <option value="-">Subtraction</option>
                <option value="*">Multiplication</option>
                <option value="/">Division</option>
            </select>
            <input type="submit" id="btn" class="generalInput" value="Calculate" >
        </form> 
        <div id="answer"></div> 
    </div>  


    <script>
        const answer = document.getElementById('answer');
        const number1 = document.getElementById('number1');
        const number2 = document.getElementById('number2');

        let answerVal = "<?php if(isset($answer)) { echo $answer; }; ?>";
        // alert(answerVal);
        let num1 = "<?php if(isset($num1)) { echo $num1; } ?>";
        let num2 = "<?php if(isset($num2)) { echo $num2; } ?>";

        if(answerVal) {
            if(answerVal === "Please Select A Valid Operator!") {
                num1 ? number1.value = num1 : null;
                num2 ? number2.value = num2 : null;
                answer.style.border = "2px solid red";
                answer.style.color = "red";
            } else {
                num1 ? number1.value = num1 : null;
                num2 ? number2.value = num2 : null;
                answer.style.border = "2px solid green";
            }
            answer.innerHTML = answerVal;            
        }
    </script>
</body>
</html>