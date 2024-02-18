// Import necessary functions and components from WordPress packages and local files
import { registerBlockType } from '@wordpress/blocks'; // Function to register block type
import './style.scss'; // Styles for the block
import metadata from './block.json'; // Block metadata from JSON file
import Edit from './edit'; // Edit component for the block
import Save from './save'; // Save component for the block

// Register the custom block type with WordPress
registerBlockType(metadata.name, {
    ...metadata, // Spread the metadata object to include its properties
    edit: Edit, // Specify the Edit component for the block
    save: Save, // Specify the Save component for the block
});
