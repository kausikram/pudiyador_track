(function ($) {
    function DynoForm(jquery_obj, options){
        this.$element = jquery_obj;
        if(options["form_structure"]){
            this.form_structure = options["form_structure"];
            this.renderForm();
        }
    }

    DynoForm.prototype = {};

    DynoForm.prototype.setFormAttrs = function () {
        for (var key in this.form_structure) {
            if($.inArray(key,["fields", "submit", "values"]) === -1) {
                this.$form.attr(key, this.form_structure[key]);
            }
        }
    };

    DynoForm.prototype.createField = function (field_map) {
        var el;
        switch(field_map["type"]) {
        case undefined:
            el = jQuery("<input>");
            el.attr("type","text");
            break;

        case "text":
            el = jQuery("<input>");
            el.attr("type","text");
            break;

        case "textarea":
            el = jQuery("<textarea>");
            break;

        case "password":
            el = jQuery("<input>");
            el.attr("type","password");
            break;

        case "select":
            el = jQuery("<select>");
            var option;
            for(var key in field_map["options"]){
                option = jQuery("<option>");
                option.attr("value", field_map["options"][key][1]);
                option.text(field_map["options"][key][0]);
                el.append(option);
            }
            break;

        }
        el.attr("name", field_map["name"]);
        return el;
    };

    DynoForm.prototype.createLabel = function (field_map) {
        var label = $("<label>");
        label.text(field_map["label"]);
        label.attr("for", field_map["name"]);
        return label;
    };

    DynoForm.prototype.createLabeledField = function (field_map) {
        this.$form.append(this.createLabel(field_map));
        this.$form.append(this.createField(field_map));

    };

    DynoForm.prototype.updateFormFields = function () {
        this.$form.empty();
        for (var i=0; i< this.form_structure["fields"].length; i++) {
            var field_map = this.form_structure["fields"][i];
            this.createLabeledField(field_map);
        }
    };

    DynoForm.prototype.updateValues = function () {
        if(this.form_structure["values"]) {
            for(var key in this.form_structure["values"]){
                this.$form.find("[name='" + key +"']").val(this.form_structure["values"][key]);
            }
        }
    };

    DynoForm.prototype.createActionButtons = function () {
        var submit_button = jQuery("<input>");
        submit_button.attr("type","submit")
        if (this.form_structure["submit"]) {
            submit_button.attr("value", this.form_structure["submit"]);
        }
        this.$form.append(submit_button);
        if (this.form_structure["reset"]) {
            var reset_button = jQuery("<input>");
            reset_button.attr("type","reset");
            reset_button.attr("value", this.form_structure["reset"]);
            this.$form.append(reset_button);
        }
    };


    DynoForm.prototype.renderForm = function(){
        this.$form = $("<form>");
        this.setFormAttrs();
        this.updateFormFields();
        this.updateValues();
        this.createActionButtons();
        this.$element.append(this.$form);
    };


    ///////////////////////////////
    /////// jQuery Plugin /////////
    ///////////////////////////////
    
    $.fn.dynoForm = function(options){
        this.each(function(){
            var $this = jQuery(this);
            if (!$this.data("dynoform")) {
                var dynoform = new DynoForm($this, options);
                $this.data("dynoform", dynoform);
            }
        });
        return this;
    };
}(jQuery));