var map = new Object(); // or var map = {};


bugtype_map = {'1':'Indentation', '2':'Security', '3':'Logical', '4':'Conditional', '5':'Syntax', '6':'Return Value', '7': 'Initialization', '8' : 'Assignment', '9' : 'Model'};

function animate_code_container() {
         $('.code_container').animate({
                  height: "100%"
                  
                  
                  },5000);
}

function mark() {
    slider.stop().slideUp();
    $('.marked-line').removeClass('marked-line');
    add_bug();
	
}
function display(data)
		{
			document.getElementById('display_hint').style.display = "block";
			document.getElementById('hint').innerHTML = data;
		}
function remove_hint()
		{
		document.getElementById('display_hint').style.display = "none";
		}
function hover_hint_show()
		{
			document.getElementById('hover_hint').style.display = "block";
		}
function hover_hint_hide()
		{
			document.getElementById('hover_hint').style.display = "none";
		}

function value_setter(line)
{
         var line_number = $(line).attr('data-start');
         var active_line = document.getElementById('line_number');
         var content= "Line : " + line_number;
         $(active_line).text(content);
         active_line = document.getElementById('bug_number');
         if (map[line_number]) {
                  var bug_number = map[line_number].length + 1;
                  var content= "Bug Number : " + bug_number;
         }
         else{
                  var content= "Bug Number :  1";
                  
         }
         $(active_line).text(content)
         var bugtype_select=document.getElementById("bug_type");
         bugtype_select.value="1";
         var priority_select=document.getElementById("priority_level");
         priority_select.value="Low";
	 document.getElementById('comment').value = '';
}
function show_instructions()
{
         bootbox.dialog({
                  message: "1. Each line can have any number of bugs. Clicking on each line will open a form where you will have to fill the bug type and its priority." + "<br>" + "2. You will be awarded 5 marks per bug only when both bug type and priority level identified by you are correct otherwise 2 marks will be deducted per bug." + "<br>" + "3. Every time you click on hint, 2 marks will be deducted from your score." + "<br>" + "4. For your help, after every minute a dialog box displaying the no. of correct bugs you have found till now will popup." + "<br>" + "5. The minimum score for each code review is 0.", 
                  title: "<div style='color:red; font-size: 20px;'>" + "Instructions" + "</div>",
                  buttons: {
                           main: {
                                    label: "Close",
                                    className: "btn-primary",
                           }
                  }
         });
}

function add_bug()
{
	 var line_number = $('#line_number').text().split(":")[1].trim();
	 var bug_type=document.getElementById("bug_type").value;
	 var priority_level=document.getElementById("priority_level").value;
	 var comment = $.trim($('#comment').val());
         bug = {
                  'bug_type' : bug_type,
                  'priority' : priority_level,
	          'comment'  : comment	  
         };
         if (!(map[line_number])) {
                  map[line_number]=[];
         }
         map[line_number].push(bug);
         var bugnum = document.getElementById(line_number + "_bugnum");
         bugnum.innerHTML = map[line_number].indexOf(bug) + 1;
         var id = line_number + "_bugnum";
	 load_data_ajax(line_number,bug_type,priority_level);
	 }         

function render_bug_div(line_number){
         var bugs = document.getElementById("bug_slider");
         bugs.innerHTML = "<img id='close' src='/cosmus/images/close.png' width=40px; height=40px; style='position:relative;padding: 0; top:-5px; margin:0 0 0 95%;' onclick='bug_slider.stop().slideUp();' id='close-slider'><h3>BUGS:</h3><hr/><br/>";
         if (map[line_number]) {
                  for(var i=0; i<map[line_number].length; i++){
                           var bug = map[line_number][i];
                           bug_type = bugtype_map[bug['bug_type']];
                           var bug_number = i + 1;
                           id = "l" + line_number + "b" + bug_number;
                           classname = "bug";
                           var br = $("<br/>");
                           var div = $("<div id ='" + id + "' class='" + classname + "'>" + id.split('b')[1] + " : &nbsp;&nbsp;&nbsp;"  + "Bug Type : " + bug_type + ", &nbsp;&nbsp;&nbsp;&nbsp;Priority : " + bug['priority'] + ", &nbsp;&nbsp;&nbsp;&nbsp; Bug Description : " + bug['comment'] + "</div>");
                           var change_button = $("<button id='change' style='float:right;'>Change</button>").on('click', function(){
                                    var content = $('<h6>' + id.split('b')[1] + " : " + '</h6><h6>Bug type :</h6> <select id="bug_type"><option value="1">Indentation</option><option value="2">Security</option><option value="3">Logical</option><option value="4">Conditional</option><option value="5">Syntax</option><option value="6">Return Value</option></select><h6>Priority : </h6><select id="priority_level"><option value="Low">Low</option><option value="Medium">Medium</option><option value="High">High</option><h6 id="bug_des">Bug Description: </h6><textarea id="comment"></textarea></select><button onclick="mark()" id="submit">Change</button>');
                                    $(div).html(content);
                                    render_bug_div(line_number);
                           });
                           
                           var remove_button = $("<button id='remove' style='float:right;'>Remove</button>").on('click', function(){
                                    var i = map[line_number].indexOf(bug);
				    var bug_type=bug["bug_type"];
				    var priority_level=bug["priority"];
				    remove_data_ajax(line_number,bug_type,priority_level);
				    map[line_number].splice(i,1);
                                    console.log(map[line_number]);
                                    var bugnum = document.getElementById(line_number + "_bugnum");
                                    if (map[line_number].length) {
                                             bugnum.innerHTML = map[line_number].length;
                                    }
                                    else
                                             bugnum.innerHTML = "-";
                                    render_bug_div(line_number);
                           });
                                   
                           $('#bug_slider')[0].appendChild($(remove_button)[0]);
                           $('#bug_slider')[0].appendChild($(div)[0]);
                            $('#bug_slider')[0].appendChild($(br)[0]);
                           var rect = $(remove_button)[0].getBoundingClientRect();
                           var height = rect.bottom - rect.top;
                           remove_button.css({
                                    'float': 'right'
                           });
                           div.css({
                                    'height' : '50%'      
                           });
                  }
         }
         
}



$(document).ready(function() {
	  show_instructions();
          animate_code_container();
          slider = $('<div id="slider" style="background-color:#CCFF33;"><img id="close" src="/cosmus/images/close.png" width=40px; height=40px; style="position:relative;padding: 0; top:-5px; margin:0 0 0 95%;" onclick="slider.stop().slideUp();$(\'.marked-line\').removeClass(\'marked-line\');" id="close-slider"><h4 id="line_number"></h4><h4 id="bug_number"></h4><h4>Bug type</h4><select id="bug_type" style="font: Unica One;  color:black;"><option value="1">Indentation</option><option value="2">Security</option><option value="3">Logical</option><option value="4">Conditional</option><option value="5">Syntax</option><option value="6">Return Value</option><option value="7">Initialization</option><option value="8">Assignment</option><option value="9">Model</option></select><h4>Priority</h4><select id="priority_level" style="font: Unica One; color:black;"><option value="Low">Low</option><option value="Medium">Medium</option><option value="High">High</option></select><h4>Bug Description</h4><textarea id="comment" style="font: Unica One; color:black;"></textarea><button onclick="mark()" id="submit">Add Bug</button></div>');
         bug_slider = $('<div id="bug_slider" style="background-color:#CCFF33;><img id="close" src="/cosmus/images/close.png"?>" width=40px; height=40px; style="position:relative;padding: 0; top:-5px; margin:0 0 0 95%;" onclick="bug_slider.stop().slideUp();" id="close-slider"><h3>BUGS:</h3><hr/><br/></div>');
         $('.code-line').on('click', function() {
                  //this.appendChild($(slider)[0]);
                  $('#bug_slider').stop().slideUp();
                  $(this).after($(slider)); 
                  $('.marked-line').removeClass('marked-line');
                  $(this).addClass('marked-line');
                  var rect = this.getBoundingClientRect();
                  var line = this;
                  slider.hide(function(){
                  slider.css({
                           'top'           : 0 + '%',
                           'left'          : 0 + '%',
                           'width'         : 100 + '%',
                           'margin-bottom' : 1 + '%',
                           'margin-top'    : 1 +'%'
                  });
                 slider.slideDown('medium');
                 value_setter(line);
                  });
         });
         $('.bugnum').on('click', function(){
                  $('#slider').stop().slideUp();
                  $(this).next().after($(bug_slider));
                  var id = this.id;
                  var line_number = this.id.split('_')[0];
                  var line_id = this.id.split('_')[0] + "_line"
                  var line = document.getElementById(line_id);
                  var rect = line.getBoundingClientRect();
                  bug_slider.slideUp(function(){
                           bug_slider.css({
                                    'top'           : 0 + '%',
                                    'left'          : 0 + '%',
                                    'width'         : 100 + '%',
                                    'margin-bottom' : 1 + '%',
                                    'margin-top'    : 1 +'%'
                           });
                           render_bug_div(line_number);
                           bug_slider.slideDown('medium'); 
                  });
                  
         });
         $('#slider button').on('click',mark)
         $('.code-container').on('load',slideDown('medium'))
         
});
