@extends('layouts.dashboard')

@section('dashboardcontent')

<h3>Words</h3>
<div id="wordCloud"></div>
<h3>Rejected</h3>
<div id="rejectCloud"></div>

<script type="text/javascript">
      /*!
       * Create an array of word objects, each representing a word in the cloud
       */
      var word_array = [
          {text: "Lorem", weight: 15},
          {text: "Ipsum", weight: 9, link: "http://jquery.com/"},
          {text: "Dolor", weight: 6, html: {title: "I can haz any html attribute"}},
          {text: "Sit", weight: 7},
          {text: "Amet", weight: 5}
          // ...as many words as you want
      ];

      $(function() {
        // When DOM is ready, select the container element and call the jQCloud method, passing the array of words as the first argument.
        $("#wordCloud").jQCloud(word_array);
      });
    </script>

@stop