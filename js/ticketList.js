
$(function() {
    showTickets();
});

function showTickets(){

    let check = document.getElementById("CTicket").checked;
    console.log(check);

    if(check===true)
    {
        $("#closed-ticket-list").show();
        for(let i in tickets) {

            if(tickets[i].ticketStatus===0)
            addClosedTicket(i);
        }
    }
    if(check === false)
    {
        $("#closed-ticket-list").hide();
    }

    for (let i in tickets) {
        if (tickets[i].ticketStatus===1) createTicket(tickets[i].ticketNumber);
    }
}


