/**
 * Created by Martin on 22/05/2015.
 */
angular.module('app', ['ui.bootstrap']).controller('TimepickerDemoCtrl', function ($scope, $log) {
    $scope.mytime = new Date();

    $scope.hstep = 1;
    $scope.mstep = 15;

    $scope.options = {
        hstep: [1, 2, 3],
        mstep: [1, 5, 10, 15, 25, 30]
    };

    $scope.ismeridian = true;
    $scope.toggleMode = function () {
        $scope.ismeridian = !$scope.ismeridian;
    };

    $scope.update = function () {
        var d = new Date();
        d.setHours(14);
        d.setMinutes(0);
        $scope.mytime = d;
    };

    $scope.changed = function () {
        $log.log('Time changed to: ' + $scope.mytime);
    };

    $scope.clear = function () {
        $scope.mytime = null;
    };
});

angular.module('app', ['ui.bootstrap']).controller('DatepickerCtrl', function ($scope) {
    $scope.today = function () {
        $scope.dt = new Date();
    };
    $scope.today();

    $scope.clear = function () {
        $scope.dt = null;
    };

    // Disable weekend selection
    $scope.disabled = function (date, mode) {
        return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
    };

    $scope.toggleMin = function () {
        $scope.minDate = $scope.minDate ? null : new Date();
    };
    $scope.toggleMin();

    $scope.open = function ($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
    };

    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1
    };

    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];

    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    var afterTomorrow = new Date();
    afterTomorrow.setDate(tomorrow.getDate() + 2);
    $scope.events =
        [
            {
                date: tomorrow,
                status: 'full'
            },
            {
                date: afterTomorrow,
                status: 'partially'
            }
        ];

    $scope.getDayClass = function (date, mode) {
        if (mode === 'day') {
            var dayToCheck = new Date(date).setHours(0, 0, 0, 0);

            for (var i = 0; i < $scope.events.length; i++) {
                var currentDay = new Date($scope.events[i].date).setHours(0, 0, 0, 0);

                if (dayToCheck === currentDay) {
                    return $scope.events[i].status;
                }
            }
        }

        return '';
    };
});

angular.module('app', ['ui.bootstrap']).controller('TypeaheadCtrl', function ($scope, $http) {

    $scope.selected = undefined;
    $scope.names = ['Martin', 'John', 'Onyesom'];

    $scope.states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Dakota', 'North Carolina', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
    // Any function returning a promise object can be used to load values asynchronously
    $scope.getLocation = function (val) {
        return $http.get('http://maps.googleapis.com/maps/api/geocode/json', {
            params: {
                address: val,
                sensor: false
            }
        }).then(function (response) {
            return response.data.results.map(function (item) {
                return item.formatted_address;
            });
        });
    };


    $scope.statesWithFlags = [{
        'name': 'Alabama',
        'flag': '5/5c/Flag_of_Alabama.svg/45px-Flag_of_Alabama.svg.png'
    }, {'name': 'Alaska', 'flag': 'e/e6/Flag_of_Alaska.svg/43px-Flag_of_Alaska.svg.png'}, {
        'name': 'Arizona',
        'flag': '9/9d/Flag_of_Arizona.svg/45px-Flag_of_Arizona.svg.png'
    }, {'name': 'Arkansas', 'flag': '9/9d/Flag_of_Arkansas.svg/45px-Flag_of_Arkansas.svg.png'}, {
        'name': 'California',
        'flag': '0/01/Flag_of_California.svg/45px-Flag_of_California.svg.png'
    }, {'name': 'Colorado', 'flag': '4/46/Flag_of_Colorado.svg/45px-Flag_of_Colorado.svg.png'}, {
        'name': 'Connecticut',
        'flag': '9/96/Flag_of_Connecticut.svg/39px-Flag_of_Connecticut.svg.png'
    }, {'name': 'Delaware', 'flag': 'c/c6/Flag_of_Delaware.svg/45px-Flag_of_Delaware.svg.png'}, {
        'name': 'Florida',
        'flag': 'f/f7/Flag_of_Florida.svg/45px-Flag_of_Florida.svg.png'
    }, {
        'name': 'Georgia',
        'flag': '5/54/Flag_of_Georgia_%28U.S._state%29.svg/46px-Flag_of_Georgia_%28U.S._state%29.svg.png'
    }, {'name': 'Hawaii', 'flag': 'e/ef/Flag_of_Hawaii.svg/46px-Flag_of_Hawaii.svg.png'}, {
        'name': 'Idaho',
        'flag': 'a/a4/Flag_of_Idaho.svg/38px-Flag_of_Idaho.svg.png'
    }, {'name': 'Illinois', 'flag': '0/01/Flag_of_Illinois.svg/46px-Flag_of_Illinois.svg.png'}, {
        'name': 'Indiana',
        'flag': 'a/ac/Flag_of_Indiana.svg/45px-Flag_of_Indiana.svg.png'
    }, {'name': 'Iowa', 'flag': 'a/aa/Flag_of_Iowa.svg/44px-Flag_of_Iowa.svg.png'}, {
        'name': 'Kansas',
        'flag': 'd/da/Flag_of_Kansas.svg/46px-Flag_of_Kansas.svg.png'
    }, {'name': 'Kentucky', 'flag': '8/8d/Flag_of_Kentucky.svg/46px-Flag_of_Kentucky.svg.png'}, {
        'name': 'Louisiana',
        'flag': 'e/e0/Flag_of_Louisiana.svg/46px-Flag_of_Louisiana.svg.png'
    }, {'name': 'Maine', 'flag': '3/35/Flag_of_Maine.svg/45px-Flag_of_Maine.svg.png'}, {
        'name': 'Maryland',
        'flag': 'a/a0/Flag_of_Maryland.svg/45px-Flag_of_Maryland.svg.png'
    }, {
        'name': 'Massachusetts',
        'flag': 'f/f2/Flag_of_Massachusetts.svg/46px-Flag_of_Massachusetts.svg.png'
    }, {'name': 'Michigan', 'flag': 'b/b5/Flag_of_Michigan.svg/45px-Flag_of_Michigan.svg.png'}, {
        'name': 'Minnesota',
        'flag': 'b/b9/Flag_of_Minnesota.svg/46px-Flag_of_Minnesota.svg.png'
    }, {
        'name': 'Mississippi',
        'flag': '4/42/Flag_of_Mississippi.svg/45px-Flag_of_Mississippi.svg.png'
    }, {'name': 'Missouri', 'flag': '5/5a/Flag_of_Missouri.svg/46px-Flag_of_Missouri.svg.png'}, {
        'name': 'Montana',
        'flag': 'c/cb/Flag_of_Montana.svg/45px-Flag_of_Montana.svg.png'
    }, {'name': 'Nebraska', 'flag': '4/4d/Flag_of_Nebraska.svg/46px-Flag_of_Nebraska.svg.png'}, {
        'name': 'Nevada',
        'flag': 'f/f1/Flag_of_Nevada.svg/45px-Flag_of_Nevada.svg.png'
    }, {
        'name': 'New Hampshire',
        'flag': '2/28/Flag_of_New_Hampshire.svg/45px-Flag_of_New_Hampshire.svg.png'
    }, {
        'name': 'New Jersey',
        'flag': '9/92/Flag_of_New_Jersey.svg/45px-Flag_of_New_Jersey.svg.png'
    }, {
        'name': 'New Mexico',
        'flag': 'c/c3/Flag_of_New_Mexico.svg/45px-Flag_of_New_Mexico.svg.png'
    }, {
        'name': 'New York',
        'flag': '1/1a/Flag_of_New_York.svg/46px-Flag_of_New_York.svg.png'
    }, {
        'name': 'North Carolina',
        'flag': 'b/bb/Flag_of_North_Carolina.svg/45px-Flag_of_North_Carolina.svg.png'
    }, {
        'name': 'North Dakota',
        'flag': 'e/ee/Flag_of_North_Dakota.svg/38px-Flag_of_North_Dakota.svg.png'
    }, {'name': 'Ohio', 'flag': '4/4c/Flag_of_Ohio.svg/46px-Flag_of_Ohio.svg.png'}, {
        'name': 'Oklahoma',
        'flag': '6/6e/Flag_of_Oklahoma.svg/45px-Flag_of_Oklahoma.svg.png'
    }, {'name': 'Oregon', 'flag': 'b/b9/Flag_of_Oregon.svg/46px-Flag_of_Oregon.svg.png'}, {
        'name': 'Pennsylvania',
        'flag': 'f/f7/Flag_of_Pennsylvania.svg/45px-Flag_of_Pennsylvania.svg.png'
    }, {
        'name': 'Rhode Island',
        'flag': 'f/f3/Flag_of_Rhode_Island.svg/32px-Flag_of_Rhode_Island.svg.png'
    }, {
        'name': 'South Carolina',
        'flag': '6/69/Flag_of_South_Carolina.svg/45px-Flag_of_South_Carolina.svg.png'
    }, {
        'name': 'South Dakota',
        'flag': '1/1a/Flag_of_South_Dakota.svg/46px-Flag_of_South_Dakota.svg.png'
    }, {'name': 'Tennessee', 'flag': '9/9e/Flag_of_Tennessee.svg/46px-Flag_of_Tennessee.svg.png'}, {
        'name': 'Texas',
        'flag': 'f/f7/Flag_of_Texas.svg/45px-Flag_of_Texas.svg.png'
    }, {'name': 'Utah', 'flag': 'f/f6/Flag_of_Utah.svg/45px-Flag_of_Utah.svg.png'}, {
        'name': 'Vermont',
        'flag': '4/49/Flag_of_Vermont.svg/46px-Flag_of_Vermont.svg.png'
    }, {'name': 'Virginia', 'flag': '4/47/Flag_of_Virginia.svg/44px-Flag_of_Virginia.svg.png'}, {
        'name': 'Washington',
        'flag': '5/54/Flag_of_Washington.svg/46px-Flag_of_Washington.svg.png'
    }, {
        'name': 'West Virginia',
        'flag': '2/22/Flag_of_West_Virginia.svg/46px-Flag_of_West_Virginia.svg.png'
    }, {'name': 'Wisconsin', 'flag': '2/22/Flag_of_Wisconsin.svg/45px-Flag_of_Wisconsin.svg.png'}, {
        'name': 'Wyoming',
        'flag': 'b/bc/Flag_of_Wyoming.svg/43px-Flag_of_Wyoming.svg.png'
    }];
    console.log($scope);
});

angular.module('app')
    .controller('TabsCtrl1', ['$scope', function ($scope) {
        $scope.tabs = [{
            title: 'CONTACTS',
            url: 'contacts.tpl.html'
        }, {
            title: 'MESSAGES',
            url: 'messages.tpl.html'

        }, {
            title: 'GROUPS',
            url: 'groups.tpl.html'

        }];

        $scope.currentTab = 'contacts.tpl.html';

        $scope.onClickTab = function (tab) {
            $scope.currentTab = tab.url;
        };
        $scope.isActiveTab = function (tabUrl) {
            return tabUrl == $scope.currentTab;
        }
    }]);

angular.module('app')
    .controller('TabsCtrl2', ['$scope', function ($scope) {
        $scope.tabs = [{
            title: 'PLANNER',
            url: 'planner.tpl.html'

        }, {
            title: 'EVENTS',
            url: 'events.tpl.html'
        }, {
            title: 'LOGS',
            url: 'logs.tpl.html'
        }];

        $scope.currentTab = 'planner.tpl.html';
        $scope.bindingTab = 'bindPlanner';

        $scope.onClickTab = function (tab) {
            $scope.currentTab = tab.url;
            $scope.bindingTab = tab.bind;
        };

        $scope.isActiveTab = function (tabUrl) {
            return tabUrl == $scope.currentTab;
        }
    }]);

/*angular.module('app',[])
 .controller('LoadTabController',['$scope', function($scope){
 $scope.swaps = [{
 name: 'CONTACT'
 },{
 name: 'PLANNER'
 }, {
 name: 'MESSAGES'

 }];

 $scope.current = 'CONTACT';
 $scope.swapBinding = 'CONTACT';
 $scope.onClickSwap = function (swap) {
 $scope.current =swap.name;
 $scope.swapBinding = swap.name;
 };

 $scope.isSwapAtive = function (swapUrl) {
 return swapUrl == $scope.current;
 }
 }]);*/

$(document).ready(function () {

    $('#viewOne li').click(function () {
        window.location = $(this).find('a').attr('href');
    })
});

$(document).ready(function () {
    $('.contactList ul li').each(function () {
        $(this).click(function () {
            $('.contactList ul li').css({
                'margin-left': '0',
                'background-color': 'rgba(255, 255, 255, 0)',
                'transition': 'all 0.3s ease-in',
                '-moz-transition': 'all 0.3s ease-in',
                '-webkit-transition': 'all 0.3s ease-in',
                '-ms-transition': 'all 0.3s ease-in',
                '-o-transition': 'all 0.3s ease-in'
            });

            $('.contactList ul ul').css({
                'display': 'none',
                'transition': 'all 0.3s ease-in',
                '-moz-transition': 'all 0.3s ease-in',
                '-webkit-transition': 'all 0.3s ease-in',
                '-ms-transition': 'all 0.3s ease-in',
                '-o-transition': 'all 0.3s ease-in'
            });
            $(this).css({
                'margin-left': "2%", 'background-color': 'rgba(38, 63, 81, 0.7)',
                'transition': 'all 0.3s ease-in',
                '-moz-transition': 'all 0.3s ease-in',
                '-webkit-transition': 'all 0.3s ease-in',
                '-ms-transition': 'all 0.3s ease-in',
                '-o-transition': 'all 0.3s ease-in'
            });
            $('.contactList ul li').find('h1').css({'background-color': 'rgba(38, 63, 81, 0)'});
            $('.contactList ul li').find('a').css({'color': ''});
            $('.contactList ul li').find('p').css({'color': ''});
            $('.contactList ul li').removeClass('arrow');
            $(this).find('p').css({'color': 'rgba(255, 255, 255, 0.83)'});
            $(this).find('a').css({'color': '#fff'});
            $(this).find('h1').css({'background-color': 'rgba(38, 63, 81, 0.7)'});
            $(this).addClass('arrow');

            $(this).find('ul').css({
                'display': 'block',
                'transition': 'all 0.3s ease-in',
                '-moz-transition': 'all 0.3s ease-in',
                '-webkit-transition': 'all 0.3s ease-in',
                '-ms-transition': 'all 0.3s ease-in',
                '-o-transition': 'all 0.3s ease-in'
            });
        });
    });


    /* $('.contactList ul li').hover(function () {
     $('.contactList ul li').css({'background-color': 'rgba(255, 255, 255, 0)'});
     $(this).css({
     '-webkit-transition': "all 0.3s ease-in",
     '-moz-transition': "all 0.3s ease-in",
     '-ms-transition': "all 0.3s ease-in",
     '-o-transition': "all 0.3s ease-in",
     'transition': "all 0.3s ease-in",
     'background-color': 'rgba(155, 155, 155, 0.3)'
     });
     });*/


});

$(document).ready(function () {

    $('#planner.tpl.html').click(function () {
        alert('ji');
    });

    var $array = [{
        name: 'CONTACTS',
        link: '#rightContact'
    }, {
        name: '#groups.tpl.html',
        link: 'rightContacts'
    }];

    $.each($array, function (key, value) {
        $.each(value, function (objkey, objvalue) {
            //alert(objkey + ": " + objvalue);

            $(objvalue).click(function () {
                console.log(objvalue);

                //alert(val);
            })
        });

    });

});

$(function () {
    //$('.contactList ul ul').jScrollPane();
});

$(document).ready(function () {
    $('._profile').mouseenter(function () {
        $('.container-fluid').css({
            'margin-top': '7%',
            'transition': 'all 0.3s ease-in',
            '-moz-transition': 'all 0.3s ease-in',
            '-webkit-transition': 'all 0.3s ease-in',
            '-ms-transition': 'all 0.3s ease-in',
            '-o-transition': 'all 0.3s ease-in'
        });
    });
    $('._profile').mouseleave(function () {
        $('.container-fluid').css({
            'margin-top': '2%',
            'transition': 'all 0.3s ease-in',
            '-moz-transition': 'all 0.3s ease-in',
            '-webkit-transition': 'all 0.3s ease-in',
            '-ms-transition': 'all 0.3s ease-in',
            '-o-transition': 'all 0.3s ease-in'
        });
    });

});