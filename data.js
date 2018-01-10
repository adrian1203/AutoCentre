function adddate(){
    var data=new Date();
    var day=data.getDate();
    var month=data.getMonth()+1;
    var year=data.getFullYear();
    if(day<10){
        day="0"+day;
    }
    if(month<10){
        month="0"+month;
    }
    var Data=year+"-"+month+"-"+day;
    //return Data;
    document.getElementById('data').value=Data;
}