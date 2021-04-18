import React, { Component } from 'react'
import ReactDOM from 'react-dom'

class Example extends Component {
    render() {
        return (
            <div>
                <h1>Cool, it's working</h1>
            </div>
        )
    }
}

export default Example

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'))
}