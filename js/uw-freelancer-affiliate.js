function uw_freelancer_affiliate(json) {   
    console.log(json);
    console.log(uw_freelancer_obj);
    // let's check if received at least 1 project
    if (json.projects.count>0) {
        
        json.projects.items.forEach(function(p){
         //document.write('<h3>'+ p.name + '</h3>');   
        
        // format budget
        var budget = ((p.budget.min!='' && p.budget.max!='')?'$'+p.budget.min+' - $'+p.budget.max:'')+
                ((p.budget.min!='' && p.budget.max=='')?'from $'+p.budget.min:'')+
                ((p.budget.min=='' && p.budget.max!='')?'up to $'+p.budget.max:'');

        // format project name
        var projectTitle = p.name + 
                (p.options.featured?' <sup><b style="color:darkblue">Featured</b></sup>':'')+
                (p.options.trial?' <sup><b style="color:gray">Trial</b></sup>':'')+
                (p.options.nonpublic?' <sup><b style="color:#694E5A">Nonpublic</b></sup>':'')+
                (p.options.urgent?' <sup><b style="color:red">Urgent</b></sup>':'');

        if(uw_freelancer_obj.show_adname == true){
            document.write('<h3>'+projectTitle + '</h3>');
        }     
        
        if(uw_freelancer_obj.show_addesk == true){
            document.write('<p>' + p.short_descr + '</p>');
        } 
        
        if(uw_freelancer_obj.show_startdate == true){
            var start = new Date(p.start_unixtime*1000);
            document.write('Posted on: ' + start.getFullYear() + '<br />');
        } 
        if(uw_freelancer_obj.show_enddate == true){
            document.write('Bidding ends on :' + p.end_unixtime + '<br />');
        }   
        if(uw_freelancer_obj.show_daysleft == true){
            document.write('Days left : ' + p.daysLeft + '<br />');
        }   
        
        if(uw_freelancer_obj.show_bidcount == true){
            document.write('Total bids : ' + p.bid_stats.count + '<br />');
        }  
        if(uw_freelancer_obj.show_bidavg == true){
            document.write('Bid average : ' + p.bid_stats.avg + '<br />');
        }             
                
            
        if(uw_freelancer_obj.show_budget == true){
            document.write('<p>Budget: ' + budget + '</p>');
        }
        
        document.write('<p><a href="'+p.url+'">Bid on this project</a></p>');
        
    });
    
    }
}