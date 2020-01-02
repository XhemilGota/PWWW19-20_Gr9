var street = ["2646 Union St", "950 Lombard St", "11526 Wendover Ln", "3102 Ferndale St", "2448 E 12th St","1218 Roberto Lane","10250 W SUNSET","1160 SAN YSIDRO Drive", "2223 QUEENSBOROUGH Lane",
              "2799 Broadway St", "284 Foster St", "632 W Deming Pl", "500 W Wisconsin St", "2590 Green St", "602 Birdsall St", "2111 Persa St","455 West 19th Street","1191 North Bundy Drive",
	          "4160 Raynolds Ave","450 Ridge Rd","22648 Pacific Coast Highway", "5021 Steinbeck Street", "16700 Bajio Ct", "277 Saint Pierre Rd"
              ];

var city = ["San Francisco, CA 94123, Cow Hollow", "San Francisco, CA 94133, Russian Hill", "Houston, TX 77024Piney Point",
    "Houston, TX 77098", "Brooklyn, NY 11235Sheepshead Bay","Los Angeles, CA 90077","Bel-Air / Holmby Hills, California","Beverly Hills, California","Bel-Air / Holmby Hills, California",
	"San Francisco, CA 94115Pacific Heights", "Boston, MA 02135Brighton", "Chicago, IL 60614Park West", "Chicago, IL 60614Lincoln Park",
	"San Francisco, CA 94123Cow Hollow", "Houston, TX 77007", "Houston, TX 77019","New York","Los Angeles, CA 90049","Coconut Grove, FL 33133","Coral Gables, FL 33143",
	"Malibu, CA 90265", "Carrollton, TX 75010","Encino, CA 91436", "Los Angeles, CA 90077"
];

var bedroom = [4, 6, 5, 3, 4, 6, 17,6,5,6,5,6,3,5,4,4,4,5,5,5,13,5,6,8];

var bathroom = [7, 8, 3, 2, 3, 7, 22, 8,6,9,3,9,3,8,5,7,4,4,5,6,13,4,6,20];

var sqrt = [5465, 9495, 3200, 1100,3368, 5777, 30000, 8060 ,8542,11000,2010,9000,3350,2100,4100,3900,3794,5978,4301,5112,8402,5093,6625,36000];

var price = ["$5,000,000", "$6,500,000", "$1,200,000", "$200,000", "$700,000", "$2,450,000", "$8,000,000","$1,250,000","$1,500,000",
    "$3,500,000", "$200,000", "$1,700,000", "$600,000", "$2,900,000", "$2,000,000", "$800,000","$950,000","$1,100,000","$1,450,000","$900,000","$2,500,000",
	"$700,000","$1,300,000","$7,200,000"
];

window.onload = function (){
	var index = localStorage.getItem("index");
	console.log(index);
	document.getElementById("propertyStreet").value = street[Number(index)];
	document.getElementById('propertyCity').value = city[Number(index)];
	document.getElementById('propertyBed').value = bedroom[Number(index)];
	document.getElementById('propertyBath').value = bathroom[Number(index)];
	document.getElementById('propertySqrt').value = sqrt[Number(index)];
	document.getElementById('propertyPrice').value = price[index];
}