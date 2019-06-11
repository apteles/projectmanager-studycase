import React from 'react'
import {Link} from 'react-router-dom'
import projectManager from '../../apis/projectManager'
import Panel from '../../components/panel'
import Table from '../../components/table'

export default class Client extends React.Component {

    state = { clients: [] }

    async componentDidMount(){
       
        const clients = await projectManager.get('client')
        
        this.setState({...this.state, clients: clients.data})
 
    }


    renderAction = (id) => {
       
        return (
            <React.Fragment>
                <Link to={`/clients/delete/${id}`} className="btn btn-danger" onClick={ () => console.log('hi') }> 
                    <span className="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </Link>
                <Link to={`/clients/edit/${id}`} className="btn btn-default"> 
                    <span className="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </Link>
              
           </React.Fragment>
        ) 
    }
    
    render(){

        const {clients} = this.state
        
        
        return (
            <div className="container">
                <div className="row">
                    <Panel title="Listagem de Usuários" panel="default">

                        <Table labels={['Nome','Responsável','E-mail','Telefone','Ações']} 
                               data={clients} 
                               actions={this.renderAction}
                        />
                    </Panel>
                </div>
            </div>
        )
    }
}