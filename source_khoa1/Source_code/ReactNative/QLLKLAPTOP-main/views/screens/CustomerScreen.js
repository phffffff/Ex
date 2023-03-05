import React, { Component } from 'react'
import { StyleSheet, Text, View, TouchableOpacity, Image, FlatList,TextInput } from 'react-native'
import { GiftedChat } from 'react-native-gifted-chat';
import QuickReplies from 'react-native-gifted-chat/lib/QuickReplies';

export default class CustomerScreen extends Component{
    constructor(props){
        super(props)
        this.navigation = props.navigation;
        this.state = {
            messages:[]
        }
    }
    
    UNSAFE_componentWillMount() {
        this.setState({
          messages: [
            {
              _id: 1,
              text: 'Shop có thể hỗ trợ tôi được không ạ!',
              createdAt: new Date(),
              user: {
                _id: 2,
                name: 'React Native',
                avatar: 'https://placeimg.com/140/140/any',
              },
            },
          ],
        })
      }
      
      onSend(messages = []) {
        this.setState(previousState => ({
          messages: GiftedChat.append(previousState.messages, messages),
        }))
      }
    render(){
        return(
            <View style={styles.mainView}>
                <View style={styles.TopView}>
                    <Text style={{fontSize:20}}>Hello. What can we help you with?</Text>
                </View>
                <View style={styles.BottomView}>
                    <GiftedChat style={styles.chatText}
                    messages={this.state.messages}
                    onSend={messages => this.onSend(messages)}
                    onQuickReply={(QuickReplies)}
                    user={{
                    _id:1
                    }}
                    alwaysShowSend
                    scrollToBottom    
                    />
                </View>
            </View>
        )
    }
}

const styles= StyleSheet.create({
    mainView:{
        flex:1,
        flexDirection: 'column',
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor:'#808080'
    },
    TopView:{
        width: '100%',
        height:'20%',
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#888888',
        padding:20
    },
    chatText:{
        backgroundColor:'#202020',

    },
    BottomView:{
        width: '100%',
        height:'80%',
        backgroundColor: '#888888',
        display:'flex',
    },
    bottom:{
        position: 'absolute',
        bottom: 0,
    },
    TextInput:{
        width: '1000%',
        borderWidth: 1,
        borderColor:'white',
        height: 42,
        paddingLeft:5,
        marginTop:20,
    },
    Imagest:{
        width: '50%',
        backgroundColor: 'white',
        resizeMode: 'contain'
    },
})