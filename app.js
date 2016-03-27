var app = angular.module('app', []);

app.controller("CountryController", function() {
    this.logo = "http://www.cnblogs.com/images/logo_small.gif";

    this.countries = [
        {
            name: "Germany",
            code: "de",
            states: [{ name: 'Bavaria' }, { name: "Berlin" }]
        },
        {
            name: "United States",
            code: "us",
            states: [{ name: 'Bavaria' }, { name: "Berlin" }]
        },
        {
            name: "China",
            code: "cn",
            states: [{ name: 'jiangsu' }, { name: "jiangxi" }]
        }
    ]
});