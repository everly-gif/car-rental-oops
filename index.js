function changeImage(source,number,cdid){
    document.getElementById("big-img").src = source;

    document.getElementById("number").innerText = number;

    url = document.getElementById("booking-url").href ;

   new_url = url.replace(url.split('?')[1].split('&')[0],`cdid=${cdid}`);

   document.getElementById("booking-url").href = new_url;
}

function calculatePrice(price,discount){
    let start_date = document.getElementById("start_date").value;
    let end_date = document.getElementById("end_date").value;
     
    if(start_date!=""){
    
    let days = (new Date(end_date)- new Date(start_date))/86400000;

    if(days<0){
    alert("Start Date cannot be greater than end date");
    window.location.reload()
    }
  
    else if(days==0) days = 1;

    else
    {let final_amount = price * days;
    let discount_amount = (discount/100)*final_amount;
    final_amount = final_amount-discount_amount;
    document.getElementById("price").innerText = "Rs "+ final_amount;
    }
    

    }
    else{
        alert("Please choose a start date");
        window.location.reload()
    }
    
}