import React, { Component } from 'react';
import './App.css';
import Budget from './Budget.js'


const budget = {
    "incomeStreams": [
        {
            "key": 1,
            "name": "Paycheck",
            "amount": 4000,
            "frequency": 1,
        },
        {
            "key": 2,
            "name": "Consulting",
            "amount": 1000,
            "frequency": 1,
        }
    ],
    "expenses": [
        {
            "key": 1,
            "name": "Mortgage",
            "amount": 2000,
        },
        {
            "key": 2,
            "name": "Internet",
            "amount": 60,
        },
        {
            "key": 3,
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
