function get_district(id) {
    send_data({
        id: id
    }, "get_district");
    id_province = id;
}

function get_ward(id_district) {
    send_data1({
        id_province: id_province,
        id_district: id_district
    }, "get_ward");
}

function send_data1(data = {}, data_type) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            handle_result1(this.responseText);
        }
    };
    ajax.open("POST", "<?=ROOT?>ajax_country/" + data_type + "/", true);
    ajax.send(JSON.stringify(data));
}

function send_data(data = {}, data_type) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            handle_result(this.responseText);
        }
    };
    ajax.open("POST", "<?=ROOT?>ajax_country/" + data_type + "/", true);
    ajax.send(JSON.stringify(data));
}

function handle_result(result) {
    console.log(result);
    district
    if (result != "") {
        var obj = JSON.parse(result);
        if (obj.data_type == "get_district") {
            document.querySelector("#district").innerHTML = obj.data;
            document.querySelector("#ward").innerHTML = obj.data2;
        }
    }

}

function handle_result1(result) {
    console.log(result);
    district
    if (result != "") {
        var obj = JSON.parse(result);
        document.querySelector("#ward").innerHTML = obj.data1;
    }

}