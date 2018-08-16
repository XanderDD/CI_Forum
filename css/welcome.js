function myClick(num) {  
            switch(num){
            	case 1:
	                document.getElementById('d1').setAttribute("src", "/CI_FORUM/images/yes.png");
	                document.getElementById('d2').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d3').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d4').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d5').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('fea5').style.display = "none";
	                document.getElementById('fea4').style.display = "none";
	                document.getElementById('fea3').style.display = "none";
	                document.getElementById('fea2').style.display = "none";
	                document.getElementById('fea1').style.display = "inline";
	                break;
            
                case 2:
	                document.getElementById('d1').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d2').setAttribute("src", "/CI_FORUM/images/yes.png");
	                document.getElementById('d3').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d4').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d5').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('fea5').style.display = "none";
	                document.getElementById('fea4').style.display = "none";
	                document.getElementById('fea3').style.display = "none";
	                document.getElementById('fea2').style.display = "inline";
	                document.getElementById('fea1').style.display = "none";
	                break;


	            case 3:
	                document.getElementById('d1').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d2').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d3').setAttribute("src", "/CI_FORUM/images/yes.png");
	                document.getElementById('d4').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d5').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('fea5').style.display = "none";
	                document.getElementById('fea4').style.display = "none";
	                document.getElementById('fea3').style.display = "inline";
	                document.getElementById('fea2').style.display = "none";
	                document.getElementById('fea1').style.display = "none";
	                break;

	            case 4:
	                document.getElementById('d1').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d2').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d3').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d4').setAttribute("src", "/CI_FORUM/images/yes.png");
	                document.getElementById('d5').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('fea5').style.display = "none";
	                document.getElementById('fea4').style.display = "inline";
	                document.getElementById('fea3').style.display = "none";
	                document.getElementById('fea2').style.display = "none";
	                document.getElementById('fea1').style.display = "none";
	                break;

	            case 5:
	                document.getElementById('d1').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d2').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d3').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d4').setAttribute("src", "/CI_FORUM/images/no.png");
	                document.getElementById('d5').setAttribute("src", "/CI_FORUM/images/yes.png");
	                document.getElementById('fea5').style.display = "inline";
	                document.getElementById('fea4').style.display = "none";
	                document.getElementById('fea3').style.display = "none";
	                document.getElementById('fea2').style.display = "none";
	                document.getElementById('fea1').style.display = "none";
	                break;
            }    
        }  