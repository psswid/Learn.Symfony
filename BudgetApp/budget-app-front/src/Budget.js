import React, { Component } from 'react';
import './Budget.css';
import request from 'request'
import Promise from 'promise'


class IncomeStream extends Component{
    render() {
        return (
            <tr>
                <td>{this.props.name}</td>
                <td>{this.props.amount}</td>
                <td>{this.props.frequency}</td>
            </tr>
        )
    }
}

class Expense extends Component{
    render() {
        return (
            <tr>
                <td>{this.props.name}</td>
                <td>{this.props.amount}</td>
            </tr>
        )
    }
}

const fetchBudget = () =>{

    return new Promise(function(resolve, reject) {
        request('http://127.0.0.1:8000/budget/', function (error, response, body) {
            console.log('error:', error); // Print the error if one occurred
            console.log('statusCode:', response && response.statusCode); // Print the response status code if a response was received
            console.log('body:', body); // Print the HTML for the Google homepage.

            resolve(JSON.parse(body));
        });
    });
}

class Budget extends Component {
    constructor(props) {
        super(props)
        this.state = {
            incomeStreams: [],
            expenses: [],
        }
    }

    componentDidMount() {
        fetchBudget()
            .then(budget =>{
                this.setState({...budget})
            })
    }

    render() {

        const incomeStreamComponents = this.state.incomeStreams.map(incomeStreamObject => {
            return(
                <IncomeStream {...incomeStreamObject} />
            )
        })

        const expenses = this.state.expenses.map(expenseObject => {
            return(
                <Expense {...expenseObject}/>
            )
        })

        return (
            <div className="Budget">
                <h1>Budget </h1>
                <div>
                    <h2>Income streams: </h2>

                    <table border="1">
                        <thead>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Frequency</th>
                        </thead>
                        <tbody>
                            {incomeStreamComponents}
                        </tbody>
                    </table>
                </div>

                <div className="BudgetExpense">
                    <h2>Expenses </h2>

                    <table border="1">
                        <thead>
                            <th>Name</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            {expenses}
                        </tbody>
                    </table>
                </div>


            </div>
        );
    }
}

export default Budget;
