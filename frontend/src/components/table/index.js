import React from 'react'

const Table = ({data,actions,labels}) => {

    const renderRows = () => {
        
        if(data) {
            return data.map( v => 
                
                (<tr key={v.id}>
                    <td>{v.name}</td>
                    <td>{v.responsible}</td>
                    <td>{v.email}</td>
                    <td>{v.phone}</td>
                    {renderActions(v.id)}
                </tr>)
            )
        }
 
    }

    const renderActions = (id) => {
        
        if(actions){
            return (
                <td>{actions(id)}</td>
            )
        }
    }
    
    console.log(labels.forEach( v => console.log(v)));

    return (
        <table className="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Responsável</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                {renderRows()}
            </tbody>
        </table>
    )
}

export default Table