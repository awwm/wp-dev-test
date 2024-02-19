// Import WordPress components
const { registerBlockType } = wp.blocks;
const { createElement } = wp.element;
const { ToggleControl, TextControl } = wp.components;
const { RichText } = wp.blockEditor;

// Register event block
registerBlockType('wis/events', {
    title: 'Events Block',
    icon: 'calendar',
    category: 'common',
    attributes: {
        blockTitle: {
            type: 'string',
            default: 'Events Block',
        },
        blockDescription: {
            type: 'string',
            source: 'html', // Use HTML for the RichText component
            selector: 'div', // Target the <div> tag for the block description
            default: '', // Default value for block description
        },
        numberOfPosts: {
            type: 'number',
            default: 5, // Default number of posts to display
        },
        showFeaturedImage: {
            type: 'boolean',
            default: true, // Default to show featured image
        },
        linkToDetailPage: {
            type: 'boolean',
            default: true, // Default to link to detail page
        },
    },
    edit: function(props) {
        const { attributes, setAttributes } = props;

        return createElement(
            'div',
            { className: 'events-block' }, // Add a class for custom styling
            createElement(
                'div',
                { className: 'events-block-section' }, // Add a class for styling block sections
                createElement(TextControl, {
                    label: 'Block Title',
                    value: attributes.blockTitle,
                    onChange: (value) => setAttributes({ blockTitle: value }),
                }),
            ),
            createElement(
                'div',
                { className: 'events-block-section' }, // Add a class for styling block sections
                createElement('span', { className: 'events-block-label' }, 'Block Description'), // Add label
                createElement(RichText, {
                    tagName: 'div',
                    placeholder: 'Enter block description...',
                    value: attributes.blockDescription,
                    onChange: (value) => setAttributes({ blockDescription: value }),
                }),
            ),
            createElement(
                'div',
                { className: 'events-block-section' }, // Add a class for styling block sections
                createElement(TextControl, {
                    label: 'Number of Posts',
                    value: attributes.numberOfPosts,
                    onChange: (value) => setAttributes({ numberOfPosts: parseInt(value) }),
                }),
            ),
            createElement(
                'div',
                { className: 'events-block-section' }, // Add a class for styling block sections
                createElement(ToggleControl, {
                    label: 'Show Featured Image',
                    checked: attributes.showFeaturedImage,
                    onChange: (value) => setAttributes({ showFeaturedImage: value }),
                }),
            ),
            createElement(
                'div',
                { className: 'events-block-section' }, // Add a class for styling block sections
                createElement(ToggleControl, {
                    label: 'Link to Detail Page',
                    checked: attributes.linkToDetailPage,
                    onChange: (value) => setAttributes({ linkToDetailPage: value }),
                }),
            )
        );
    },
    save: function() {
        return createElement(
            'div',
            null,
            'This is the saved view of the custom block.'
        );
    },
});
