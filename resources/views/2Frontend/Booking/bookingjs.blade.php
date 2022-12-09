<script>

    function updatePrice()
    {
        let cars = {!! json_encode($cars) !!};
        let price = {!! json_encode($price) !!};
            price = parseFloat(price);
            price = price.toFixed(2);
        let returnPrice = {!! json_encode($returnPrice) !!};
            returnPrice = parseFloat(returnPrice);
            returnPrice = returnPrice.toFixed(2);
        let carPrice = parseFloat(0);
        let tp = parseFloat(0);
        let meetPrice = {!! json_encode($siteSettings[0]->value) !!}
            meetPrice = parseFloat(meetPrice);
        var f = document.getElementById("return");
        let returnType = f.options[f.selectedIndex].value;
        let eM = document.getElementById("meet");
        let meet = eM.options[eM.selectedIndex].value;
        let e = document.getElementById("car_type");
        let car_type = e.options[e.selectedIndex].value;
        let surcharge = document.getElementById('surAmount').value;
            surcharge = parseFloat(surcharge);
            surcharge = surcharge.toFixed(2);
        let surchargeR = document.getElementById('surRAmount').value;
            surchargeR = parseFloat(surchargeR);
            surchargeR = surchargeR.toFixed(2);
        if(meet == 0)
        {
            meetPrice = meetPrice*(-1)
        }

        for(var i=0; i<cars.length; i++)
        {
            if (car_type == cars[i].id)
            {
                if(cars[i].fair == 500)
                {
                    carPrice = parseFloat(price*.5);
                }
                else
                {
                    carPrice = parseFloat(cars[i].fair);
                }
            }

        }
        if(returnType == 0){
            returnPrice = 0;
        }
        else {
            carPrice = carPrice+carPrice;
        }

        tp = parseFloat(price) + parseFloat(returnPrice) + parseFloat(carPrice) + parseFloat(meetPrice) + parseFloat(surcharge) +parseFloat(surchargeR);

        $("#hiddenPrice").val(function() {
            tp = parseFloat(tp);
            tp = Math.round(tp*100)/100;
            return tp;
        });

        $("#hiddenCarPrice").val(function() {
            carPrice = Math.round(carPrice*100)/100;
            return carPrice;
        });
        var button = document.getElementById('bookingButton');

        button.innerHTML = 'Book Now with Total Fair £'+  tp;
    }

    $('#car_type').on('change', function() {
        updatePrice()
    });

    $('#meet').on('change', function() {
        updatePrice()
    });
    $('#return').on('change', function() {

        document.getElementById("return_date").disabled = (this.value === '0');
        var x = document.getElementById("rDate");
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        document.getElementById("return_dropoff_address").disabled = (this.value === '0');
        var xy = document.getElementById("rDA");
        if (xy.style.display === "none") {
        xy.style.display = "block";
        } else {
            xy.style.display = "none";
        }
        document.getElementById("return_pickup_address").disabled = (this.value === '0');
        var xz = document.getElementById("rPA");
        if (xz.style.display === "none") {
        xz.style.display = "block";
        } else {
            xz.style.display = "none";
        }
        document.getElementById("return_time").disabled = (this.value === '0');

        updatePrice()

    });

        var f1 = flatpickr(document.getElementById('journey_date'), {
        minDate: new Date().fp_incr(2),
        maxDate: new Date().fp_incr(90),
        dateFormat: "d-m-Y",
        disable: {!! $siteSettings[10]->value !!},
        onChange: function(selectedDates, dateStr, instance) {
                f3.set('minDate', dateStr)
            }
        });

        var f2 = flatpickr(document.getElementById('pickup_time'), {
            enableTime: true,
            noCalendar: true,
            time_24hr: true,
            dateFormat: "H.i",
            onClose: function(selectedDates, dateStr, instance) {
                let surchargeStart =  parseFloat(document.getElementById('surChargeS').value);
                let surchargeEnd =  parseFloat(document.getElementById('surChargeH').value);
                let price = {!! json_encode($price) !!};
                let surAdd = parseFloat(document.getElementById('surAdd').value);
                let surcharge_amount = 0;

                if( surchargeStart <= dateStr || surchargeEnd >= dateStr)
                {
                    if(surAdd == 0)
                    {
                        surcharge_amount = {!! $siteSettings[53]->value!!};
                        surcharge_amount = parseFloat(surcharge_amount);
                        let surcharge = 0;
                        if(surcharge_amount < 1)
                        {
                            surcharge = price*surcharge_amount;
                        }
                        else
                        {
                            surcharge = surcharge_amount;
                        }
                        document.getElementById('surAdd').value = 1;
                        document.getElementById('surAmount').value = surcharge_amount;
                        updatePrice()

                    }

                }
                else {
                    if(surAdd == 1)
                    {
                        document.getElementById('surAdd').value = 0;
                        document.getElementById('surAmount').value = 0;
                        updatePrice()
                    }
                }
            }
        });

        var f3 = flatpickr(document.getElementById('return_date'), {
            // minDate: "today",
            minDate: $('#journey_date').attr('value'),
            maxDate: new Date().fp_incr(90),
            disable: {!! $siteSettings[10]->value !!},
            dateFormat: "d-m-Y",
        });
        var f4 = flatpickr(document.getElementById('return_time'), {
            enableTime: true,
            noCalendar: true,
            time_24hr: true,
            dateFormat: 'H.i',
            onClose: function(selectedDates, dateStr, instance) {

                let surchargeStart =  parseFloat(document.getElementById('surChargeS').value);
                // let surchargeStartV = parseFloat(surchargeEnd.value);
                let surchargeEnd =  parseFloat(document.getElementById('surChargeH').value);
                // let surchargeEndV = parseFloat(surchargeEnd.value);
                let surAddR = parseFloat(document.getElementById('surAddR').value);
                let price = {!! json_encode($returnPrice) !!};
                let surcharge_amount = 0;
                if( surchargeStart <= dateStr || surchargeEnd >= dateStr)
                {
                    if(surAddR == 0)
                    {
                        surcharge_amount = {!! $siteSettings[53]->value!!};
                        surcharge_amount = parseFloat(surcharge_amount);
                        let surcharge = 0
                        if(surcharge_amount < 1)
                        {
                            surcharge = price*surcharge_amount;
                        }
                            else
                        {
                            surcharge = surcharge_amount;
                        }
                        document.getElementById('surAddR').value = 1;
                        document.getElementById('surRAmount').value = surcharge_amount;
                        updatePrice()
                    }

                }
                else
                {
                    if(surAddR == 1)
                    {
                        document.getElementById('surAddR').value = 0;
                        document.getElementById('surRAmount').value = 0;
                        updatePrice()
                    }
                }

            }
        });
</script>
