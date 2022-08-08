var input = document.getElementById('active-form');
var result = document.getElementById('result');

input.onkeyup = input.oncopy = input.onpaste = input.oncut = (function() {
return function() {
result.innerHTML = (this.value > 0 || this.value < 0) ? (this.value + " рублей") : this.value;
}
})();
