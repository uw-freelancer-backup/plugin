function uw_freelancer_affiliate(json) {   
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
            
        document.write('<div class="row">');            
        document.write('<div class="uw-freelancer-widget">');

        if(uw_freelancer_obj.show_adname == true){
            document.write('<h4><a href="'+p.url+'">'+projectTitle + '</a></h4>');
        }     
        
        if(uw_freelancer_obj.show_addesc == true){
            document.write( p.short_descr + '<br /><br />');
        } 
        
        if(uw_freelancer_obj.show_startdate == true){
            var start = new Date(p.start_unixtime*1000);
            var formattedstart = start.getFullYear() + '-' + start.getMonth() + '-' + start.getDate()
            document.write('Posted on: ' + formattedstart + '<br />');
        } 
        if(uw_freelancer_obj.show_enddate == true){
            var end = new Date(p.end_unixtime*1000);
            var formattedend = end.getFullYear() + '-' + end.getMonth() + '-' + end.getDate()
            document.write('Bidding ends on : ' + formattedend + '<br />');
        }   
        if(uw_freelancer_obj.show_daysleft == true){
            document.write('Days left : ' + p.daysLeft + '<br />');
        }   
        
        if(uw_freelancer_obj.show_bidcount == true){
            document.write('Total bids : ' + p.bid_stats.count + '<br />');
        }  
        if(uw_freelancer_obj.show_bidavg == true){
            document.write('Bid average : ' + p.bid_stats.avg + ' USD<br />');
        }             
                
            
        if(uw_freelancer_obj.show_budget == true){
            document.write('Budget: ' + budget + '<br />');
        }
        
        document.write('<br /><a class="radius button" href="'+p.url+'">Bid on this project</a>');
        
        document.write('</div></div>'); 
        
    });
    
    }
}