<!DOCTYPE html>

<html>
<head>
    <title>FastAPI App Name (TBA)</title>
</head>
<body>
    <h1 class="header">FastAPI App</h1>

    <div class="buttons_container">
    <button id="button__test" class="button">{{name}}</button>
    </div>

    <p id="result"></p>

    <a id="stealth_downloader" class="hidden"></a>

<style type="text/css">
.header {
    text-align: center;
    width: 100%;
    margin-top: 20px;
    margin-bottom: 20px;
}

.hidden {
    display: none;
}

.input_label {
    display: flex;
    width: 100%;
    padding-left: 5%;
    padding-right: 5%;
}
.input_label_text {
    margin-right: auto;
    width: 30%;
}
.input_box {
    margin-left: auto;
    width: 70%;
    min-height: 20px;
}

.buttons_container {
    display: flex;
    width: 90%;
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 40px;
}

.button {
    width: 40%;
    display: flex;
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #ccc;
    padding: 5px 10px;
    border-radius: 5px;
}
.button:disabled {
    border: 1px solid #7d0b0b;
    opacity: 0.8;
}
#button__scrape {
    background-color: #16910d;
    color: #fff;
}
#button__scrape:hover {
    background-color: #069649;
}
#button__export {
    background-color: #1c1fb0;
    color: #fff;
}
#button__export:hover {
    background-color: #048bb8;
}
#button__scrape:disabled {
    background-color: #568752;
    cursor: wait;
}
#button__export:disabled {
    background-color: #5a5b8c;
    cursor: not-allowed;
}

#table_container {
    margin-top: 50px;
    width: 90%;
    max-height: 400px;
    overflow-x: auto;
    overflow-y: auto;
    margin-left: auto;
    margin-right: auto;
}
table { 
  width: 100%; 
  border-collapse: collapse; 
  margin-left: auto;
  margin-right: auto;
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
  position: sticky;
  top: 0;
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
.tr_row__green {
    background-color: #b7fa87;
}
.tr_row__green:nth-of-type(odd) { 
    background-color: #6eff81; 
}
.tr_row__blue {
    background-color: #78e2ff;
}
.tr_row__blue:nth-of-type(odd) { 
    background-color: #6eadff; 
}
.tr_row__red {
    background-color: #ffc9d5;
}
.tr_row__red:nth-of-type(odd) { 
    background-color: #ffb8e2; 
}

.th_0 {
    min-width: 20px;
}
.th_1 {
    min-width: 40px;
}
.th_2 {
    min-width: 120px;
}
</style>

<script>
const universalBOM = "\uFEFF";

let test_btn = document.getElementById("button__test")
let result = document.getElementById("result")
let postSomething = function() {
    //console.log(input__keyword.value)
    let query = {
        "key": "value"
    }
    fetch('post_something',{
          method: "POST",
          headers: {
              "Content-Type": "application/json",
              // 'Content-Type': 'application/x-www-form-urlencoded',
            },
          body: JSON.stringify(query)
        })
   .then(response => {
    console.log(response)
    return response.json()
   })
   .then(json => {
    
    let data = json
    console.log(data)
    result.innerHTML = data.message
    
   }).catch(e => {
    console.error(e)
   })
}
test_btn.onclick = postSomething
</script>
</body>
</html>