$(function () {
    $.get('./history_intent.txt', function (data) {

    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    zingchart.MODULESDIR = 'https://cdn.zingchart.com/modules/';
 
    let chartConfig = {
      type: 'wordcloud',
      options: {
        text:  data,
 
        aspect: 'flow-center',
        maxItems: 40,
        minLength: 5,
        ignore: ['negative', 'cancel', 'alive', 'laugh'],
 
        colorType: 'palette',
        palette: ['#D32F2F', '#5D4037', '#1976D2', '#E53935', '#6D4C41', '#1E88E5', '#F44336', '#795548', '#2196F3', '#EF5350', '#8D6E63', '#42A5F5'],
 
        style: {
          fontFamily: 'Crete Round',
 
          hoverState: {
            backgroundColor: '#D32F2F',
            borderRadius: 2,
            fontColor: 'white'
          },
 
          tooltip: {
            text: '%text: %hits',
            visible: true,
            alpha: 0.9,
            backgroundColor: '#1976D2',
            borderRadius: 2,
            borderColor: 'none',
            fontColor: 'white',
            fontFamily: 'Georgia',
            textAlpha: 1
          }
        }
      },
 
      source: {
        text: '',
        fontColor: '#64B5F6',
        fontSize: 10,
        fontFamily: 'Georgia',
        fontWeight: 'normal',
        marginBottom: '10%'
      }
    };
 
    zingchart.render({
      id: 'wordcloudChart',
      data: chartConfig,
      height: 400,
      width: '100%'
    });

    });

});