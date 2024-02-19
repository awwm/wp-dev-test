import { __ } from '@wordpress/i18n';

// Define the Save component which will render the block's content on the frontend
const Save = ({ attributes }) => {
    // Destructure the attributes prop to extract teamData
    const { teamData, error } = attributes;

    return (
        <div className="wis-api-block-wrapper">{/* Add a wrapper class with the plugin name */}
            {/* Conditionally render the error message */}
            {error ? (
                <p>{error}</p>
            ) : (
                <>
                    {/* Render the heading "Team Data" */}
                    <h2>{__('Team Data', 'wis-api')}</h2>

                    {/* Render the table to display team data */}
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
                                {teamData.map(team => (
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
                </>
            )}
        </div>
    );
};

// Export the Save component as the default export
export default Save;
