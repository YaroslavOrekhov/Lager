let menu_flag = false;

function open_left_menu(){
    if (menu_flag == false){
        //show hidden_menu
        $(".site").css("left","200px");
        menu_flag = true;
    }else if (menu_flag == true){
        //hide menu
        $(".site").css("left","0");
        menu_flag = false;
    }
}