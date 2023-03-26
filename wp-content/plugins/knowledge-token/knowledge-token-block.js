wp.blocks.registerBlockType('knowledge/knowledge-token', {
  title: 'Knowledge Token',
  icon: 'lightbulb',
  category: 'widgets',
  attributes: {
    publicationId: { type: 'string', default:"1"},
    firstLineText: { type: 'string', default: "Thank you for reading my blog post!"},
    secondLineText: { type: 'string', default: "Click to claim your Knowledge Token"}
  },
  edit: function(props) {
    function updatePublicationId(event){props.setAttributes({publicationId: event.target.value})}
    function updateFirstLineText(event){props.setAttributes({firstLineText: event.target.value})}
    function updateSecondLineText(event){props.setAttributes({secondLineText: event.target.value})}

    const buttonBackground =
    props.attributes.firstLineText !== "" || props.attributes.secondLineText !== "" 
        ? {
            "background": "rgb(160, 205, 178)",
            "border": "2px solid rgb(43, 102, 67)",
          }
        : {}

    return React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
      style: {
        display: "flex",
        justifyContent: "space-between",
        width: "400px",
        margin: "5px"
      }
    }, /*#__PURE__*/React.createElement("label", {
      style: {}
    }, "Publication #"), /*#__PURE__*/React.createElement("input", {
      type: "text",
      value: props.attributes.publicationId,
      placeholder: "Publication #",
      onChange: updatePublicationId,
      style: {
        width: "250px"
      }
    })), /*#__PURE__*/React.createElement("div", {
      style: {
        display: "flex",
        justifyContent: "space-between",
        width: "400px",
        margin: "5px"
      }
    }, /*#__PURE__*/React.createElement("label", {
      style: {}
    }, "First line text"), /*#__PURE__*/React.createElement("input", {
      type: "text",
      value: props.attributes.firstLineText,
      placeholder: "First line text",
      onChange: updateFirstLineText,
      style: {
        width: "250px"
      }
    })), /*#__PURE__*/React.createElement("div", {
      style: {
        display: "flex",
        justifyContent: "space-between",
        width: "400px",
        margin: "5px"
      }
    }, /*#__PURE__*/React.createElement("label", {
      style: {}
    }, "Second line text"), /*#__PURE__*/React.createElement("input", {
      type: "text",
      value: props.attributes.secondLineText,
      placeholder: "Second line text",
      onChange: updateSecondLineText,
      style: {
        width: "250px"
      }
    })), React.createElement("div", {
      id: "knowledge-widget",
      style: {
        "marginTop":"10px"
      }
    }, /*#__PURE__*/React.createElement("div", {
      style: {
        "position": "relative",
        "width": "420px",
        "height": "80px",
        "margin": "auto"
      }
    }, /*#__PURE__*/React.createElement("div", {
      style: {
        "display": "flex",
        "flexDirection": "row",
        "justifyContent": "center",
        "alignItems": "center"
      }
    }, /*#__PURE__*/React.createElement("div", {
      style: {
        ...buttonBackground,
        "borderRadius": "10px",
        "padding": "5px",
        "height": "100%",
        "maxWidth": "320px",
        "maxHeight":"80px",
        "opacity": "1",
        "transition": "opacity 0.25s ease 0s"
      }
    }, /*#__PURE__*/React.createElement("div", {
      style: {
        "margin": "5px",
        "fontSize": "18px",
        "lineHeight": "20px",
        "fontFamily": "Helvetica, Arial, sans-serif",
        "overflow": "hidden",
        "wordBreak": "break-all",
        "display": "-webkit-box",
        "WebkitLineClamp": 1,
        "WebkitBoxOrient": "vertical",
      }
    }, props.attributes.firstLineText), /*#__PURE__*/React.createElement("div", {
      style: {
        "fontSize": "18px",
        "lineHeight": "20px",
        "fontFamily": "Helvetica, Arial, sans-serif",
        "margin": "5px",
        "overflow": "hidden",
        "wordBreak": "break-all",
        "display": "-webkit-box",
        "WebkitLineClamp": 1,
        "WebkitBoxOrient": "vertical",
      }
    }, props.attributes.secondLineText)), /*#__PURE__*/React.createElement("div", {
      style: {
        "width": "60px",
        "height": "60px",
        "marginLeft": "10px",
        "cursor": "pointer",
        "paddingTop": "0px"
      }
    }, /*#__PURE__*/React.createElement("div", {
      style: {
        "width": "60px",
        "height": "60px",
        "position": "relative"
      }
    }, /*#__PURE__*/React.createElement("div", {
      style: {
        "transform": "scale(1)",
        "transition": "transform 0.25s ease 0s"
      }
    }, /*#__PURE__*/React.createElement("img", {
      src: "https://knowledge-token.com/assets/coin-green.png",
      style: {
        "width": "60px",
        "height": "60px"
      }
    }), /*#__PURE__*/React.createElement("img", {
      src: "https://knowledge-token.com/assets/polygon-token.svg",
      style: {
        "right": "0px",
        "bottom": "0px",
        "position": "absolute",
        "width": "20px",
        "height": "20px"
      }
    })), /*#__PURE__*/React.createElement("img", {
      src: "https://knowledge-token.com/assets/cross.svg",
      style: {
        "width": "60px",
        "height": "60px",
        "right": "0px",
        "bottom": "0px",
        "position": "absolute",
        "transform": "scale(0)",
        "transition": "transform 0.25s ease 0s"
      }
    })))))));
  },
  save: function(props) {
    return React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
      id: "knowledge-widget"
    }), /*#__PURE__*/React.createElement("script", {
      "data-pub-id": props.attributes.publicationId,
      "data-first-line-text": props.attributes.firstLineText,
      "data-second-line-text": props.attributes.secondLineText,
      src: "https://knowledge-token.com/assets/widget/v0.1.js"
    }));
  }
})