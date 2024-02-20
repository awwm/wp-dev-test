import { useState, useEffect } from '@wordpress/element';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

// Define the Edit component responsible for editing the block in the editor
const Edit = ({ attributes, setAttributes }) => {
    // Initialize state to store fetched data
    const [data, setData] = useState([]);
    const [error, setError] = useState(null); // Add error state

    // Fetch data from the API when the component mounts
    useEffect(() => {
        fetch('https://www.balldontlie.io/api/v1/teams/')
            .then(response => response.json())
            .then(data => setData(data.data))
            .catch(error => {
                console.error('Error fetching data:', error); // Log error to console
                setError(error.message); // Set error message state
                setAttributes({ error: error.message }); // Pass error message to attributes
            });
    }, []); // The empty dependency array ensures this effect runs only once when the component mounts

    // Update block attributes with fetched data whenever it changes
    useEffect(() => {
        setAttributes({ teamData: data });
    }, [data, setAttributes]); // The effect depends on the data and setAttributes functions

    // Render the block in the editor
    return (
        <div {...useBlockProps()}>
            {/* Render a heading for the block */}
            <h2>{__('Team Data', 'wis-api')}</h2>

            {/* Render either the error message or the table */}
            {error ? (
                <p className="wis-error">{error}</p>
            ) : (
                <div className="table-responsive">
                    <table className="table table-bordered">
                        <thead>
                            {/* Render table header row */}
                            <tr>
                                {/* Render table header cells with translated text */}
                                <th>{__('ID', 'wis-api')}</th>
                                <th>{__('Abbreviation', 'wis-api')}</th>
                                <th>{__('City', 'wis-api')}</th>
                                <th>{__('Conference', 'wis-api')}</th>
                                <th>{__('Division', 'wis-api')}</th>
                                <th>{__('Full Name', 'wis-api')}</th>
                                <th>{__('Name', 'wis-api')}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {/* Map through fetched data to render table rows */}
                            {data.map(team => (
                                <tr key={team.id}>
                                    {/* Render table cells with team data */}
                                    <td>{team.id}</td>
                                    <td>{team.abbreviation}</td>
                                    <td>{team.city}</td>
                                    <td>{team.conference}</td>
                                    <td>{team.division}</td>
                                    <td>{team.full_name}</td>
                                    <td>{team.name}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            )}
        </div>
    );
};

// Export the Edit component as the default export
export default Edit;