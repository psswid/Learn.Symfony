import React, { Component } from 'react';
import './App.css';
import Budget from './Budget.js'
import request from 'request'

const budget = {
    "incomeStreams": [
        {
            "name": "Paycheck",
            "amount": 4000,
            "frequency": 1,
        },
        {
            "name": "Consulting",
            "amount": 1000,
            "frequency": 1,
        }
    ],
    "expenses": [
        {
            "name": "Mortgage",
            "amount": 2000,
        },
        {
            "name": "Internet",
            "amount": 60,
        },
        {
            "name": "Phone",
            "amount": 110,
        },
    ]
};

class App extends Component {
    render() {
        return (
            <div className="App">
                <Budget {...budget}/>
            </div>
        );
    }
}

export default App;
