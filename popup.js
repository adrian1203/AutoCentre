function showPopup(event){
    event.preventDefault();
    //console.log('Dziala');
    document.getElementById('popup').style.display='block';
}
document.querySelector('#popup .close').onclick=function(event){
    event.preventDefault();
    document.getElementById('popup').style.display='none';
};
document.getElementById('przycisk-pobierz').addEventListener('click', function(event){
    event.preventDefault();

    var inputValue = document.getElementById('popup-email').value;

    if(inputValue== ''){
        alert('Wpisz adres meilowy');
    }
})
